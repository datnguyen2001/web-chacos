<?php

namespace App\Http\Controllers\web;

use App\Enums\CouponStatus;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\ProductSizeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('web.cart.index');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }

    public function checkout(Request $request)
    {
        try {
            $addresses = Address::where('user_id', Auth::user()->id)
                ->orderBy('isDefault', 'desc')
                ->orderBy('id', 'desc')
                ->get();

            // Retrieve the 'cart_data' cookie value
            $cartData = $request->cookie('cart_data');
            // Retrieve the 'coupon_data' cookie value
            $couponData = $request->cookie('coupon_data');

            $cartItems = json_decode($cartData) ?? [];

            if (empty($cartItems)) {
                toastr()->error('Bạn chưa có sản phẩm nào trong giỏ hàng');
                return back();
            }

            $couponItems  = $couponData ? json_decode($couponData, true) : [];
            //Coupon
            $couponCode         = isset($couponItems['code'])        ? $couponItems['code']         : '';
            $couponDiscount     = isset($couponItems['discount'])    ? $couponItems['discount']     : null;
            $couponType         = isset($couponItems['type'])        ? $couponItems['type']         : null;
            $couponProductIds   = isset($couponItems['product_ids']) ? $couponItems['product_ids']  : null;

            $carts = [];

            //Cart total
            $total = 0;

            $isDiscountByProduct = false;
            foreach ($cartItems as $key => $item) {
                $isDiscountByProduct = false;
                $productInfo = ProductSizeModel::with('color.product')->find($item->product_id);
                $quantity    = $item->quantity ?? 0;

                //Count total each product
                $unitPrice = $productInfo->color->price;
                $subTotal  = $unitPrice * $quantity;

                //Check coupon for each product_ids
                $product_id = $productInfo->color->product->id;
                if ($couponProductIds != null || $couponProductIds != '') {
                    // Decoding the comma-separated product IDs into an array
                    $couponProductIdList = explode(',', $couponProductIds);

                    // Checking if any of the product IDs in $cartItems exist in $couponProductIds
                    if (in_array($product_id, $couponProductIdList)) {
                        $isDiscountByProduct = true;
                    }

                    //Get discount
                    if ($couponDiscount && $couponDiscount > 0 && $couponProductIds && $isDiscountByProduct) {
                        if ($couponType) {
                            if ($couponType == 'amount') {
                                $subTotal = $subTotal - $couponDiscount;
                            } elseif ($couponType == 'percent' && $couponDiscount <= 100) {
                                $subTotal = $subTotal - ($subTotal * $couponDiscount / 100);
                            }
                        }
                    }
                }
                //Total calc
                $total += $subTotal;

                $carts[] = [
                    'info'        => $item->product_id,
                    'id'          => $productInfo->color->product->id,
                    'product'     => $productInfo->color->product->name ?? 'Trống',
                    'thumbnail'   => $productInfo->color->image ?? '',
                    'slug'        => $productInfo->color->product->slug,
                    'color'       => $productInfo->color->name ?? 'Trống',
                    'size'        => $productInfo->name ?? 'Trống',
                    'price'       => $unitPrice,
                    'quantity'    => $quantity,
                    'sub_total'   => $subTotal
                ];
            }

            //No have product_ids -> Giảm thẳng giá cuối
            if ($couponDiscount && $couponDiscount > 0 && !$couponProductIds && !$isDiscountByProduct) {
                if ($couponType) {
                    if ($couponType == 'amount') {
                        $total = $total - $couponDiscount;
                    } elseif ($couponType == 'percent' && $couponDiscount <= 100) {
                        $total = $total - ($total * $couponDiscount / 100);
                    }
                }
            }

            return view('web.cart.checkout')->with(compact('addresses', 'carts', 'total', 'couponCode'));
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }

    public function complete()
    {
        return view('web.cart.complete');
    }

    // STORE & UPDATE CART
    public function addToCart(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'product_info' => 'required|integer',
                'quantity' => 'required|integer|min:1',
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData  = $validated->validated();

            $productInfo    = $validatedData['product_info'];
            $quantity       = $validatedData['quantity'];

            $productSize    = ProductSizeModel::findOrFail($productInfo);

            $this->checkQuantityAvailable($quantity, $productSize->quantity);

            // Retrieve the existing cart data from the cookie
            $cartData   = $request->cookie('cart_data');

            $cartItems  = $cartData ? json_decode($cartData, true) : [];

            // Find the product in the cart
            $existingProductIndex = collect($cartItems)->search(function ($item) use ($productInfo) {
                return $item['product_id'] === $productInfo;
            });

            if ($existingProductIndex !== false) {
                // Update cart product's quantity
                $cartItems[$existingProductIndex]['quantity'] += $quantity;
            } else {
                // Add new to cart
                $cartItems[] = [
                    'product_id' => $productInfo,
                    'quantity' => $quantity,
                ];
            }

            $serializedCartData = json_encode(array_values($cartItems));

            // Set the cart data in the cookie with an expiration time
            $cookie = Cookie::make('cart_data', $serializedCartData, time() + (7 * 24 * 60 * 60)); //7 days

            return response()->json(['error' => 0, 'message' => "Thêm vào giỏ hàng thành công"])->withCookie($cookie);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    //UPDATE CART QUANTITY
    public function updateCart(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'product_info' => 'required|integer',
                'quantity' => 'required|integer|min:1',
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData  = $validated->validated();

            $productInfo    = $validatedData['product_info'];
            //NEW QUANTITY WILL BE UPDATE
            $quantity       = $validatedData['quantity'];

            $productSize    = ProductSizeModel::findOrFail($productInfo);

            $this->checkQuantityAvailable($quantity, $productSize->quantity);

            // Retrieve the existing cart data from the cookie
            $cartData   = $request->cookie('cart_data');

            $cartItems  = $cartData ? json_decode($cartData, true) : [];

            // Find the product in the cart
            $existingProductIndex = collect($cartItems)->search(function ($item) use ($productInfo) {
                return $item['product_id'] === $productInfo;
            });

            if ($existingProductIndex === false) {
                return response()->json(['error' => -1, 'message' => "Not found product in cart"], 400);
            }
            // Update cart product's quantity
            $cartItems[$existingProductIndex]['quantity'] = $quantity;

            $serializedCartData = json_encode(array_values($cartItems));

            // Set the cart data in the cookie with an expiration time
            $cookie = Cookie::make('cart_data', $serializedCartData, time() + (7 * 24 * 60 * 60)); //7 days

            return response()->json(['error' => 0, 'message' => "Cập nhật số lượng thành công"])->withCookie($cookie);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    //UPDATE CART COUPON
    public function updateCartCoupon(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'coupon' => 'required|string',
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData  = $validated->validated();

            $coupon         = $validatedData['coupon'];

            //CHECK COUPON VALID
            $coupon = Coupon::where('code', $coupon)->where('status', CouponStatus::ACTIVE)
                ->where('end_date', '>', Carbon::now())->first();

            if (!$coupon) {
                return response()->json(['error' => -1, 'message' => 'Mã giảm giá không tồn tại hoặc đã hết hạn'], 400);
            }

            // Retrieve the existing coupon data from the cookie
            $cartData     = $request->cookie('cart_data');
            // Retrieve the 'coupon_data' cookie value
            $couponData   = $request->cookie('coupon_data');

            $cartItems    = $cartData ? json_decode($cartData, true) : [];

            $couponItems  = $couponData ? json_decode($couponData, true) : [];

            $couponItems['code']        = $coupon->code;
            $couponItems['discount']    = $coupon->discount;
            $couponItems['type']        = $coupon->discount_type;
            $couponItems['product_ids'] = $coupon->product_ids ?? null;

            $isCouponValid = $this->checkCouponAvailable($couponItems['product_ids'], $cartItems);

            if (!$isCouponValid) {
                return response()->json(['error' => -1, 'message' => 'Mã giảm giá không áp dụng cho các sản phẩm hiện tại'], 400);
            }

            $serializedCouponData = json_encode($couponItems);

            // Calculate the timestamp for the end of the current day
            $endOfDayTimestamp = strtotime('today 23:59:59');

            // Set the cart data in the cookie with an expiration time
            $cookie = Cookie::make('coupon_data', $serializedCouponData, $endOfDayTimestamp); //end of day

            return response()->json(['error' => 0, 'message' => "Cập nhật mã giảm giá thành công"])->withCookie($cookie);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    //REMOVE PRODUCT IN CART
    public function removeProductInCart(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'product_info' => 'required|integer',
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData = $validated->validated();

            $productInfo = $validatedData['product_info'];

            // Retrieve the existing cart data from the cookie
            $cartData = $request->cookie('cart_data');

            $cartItems = $cartData ? json_decode($cartData, true) : [];

            // Find the product in the cart
            $existingProductIndex = collect($cartItems)->search(function ($item) use ($productInfo) {
                return $item['product_id'] === $productInfo;
            });

            if ($existingProductIndex === false) {
                return response()->json(['error' => -1, 'message' => "Không tìm thấy sản phẩm trong giỏ hàng"], 400);
            }
            // Remove the product from the cart
            array_splice($cartItems, $existingProductIndex, 1);

            $serializedCartData = json_encode(array_values($cartItems));

            $cookie = Cookie::make('cart_data', $serializedCartData, 60 * 24 * 7); // 7 days

            return response()->json(['error' => 0, 'message' => "Xóa khỏi giỏ hàng thành công"])->withCookie($cookie);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    // GET CART VALUE
    public function getCartData(Request $request)
    {
        try {
            // Retrieve the 'cart_data' cookie value
            $cartData = $request->cookie('cart_data');
            // Retrieve the 'coupon_data' cookie value
            $couponData = $request->cookie('coupon_data');

            $cartItems = json_decode($cartData) ?? [];

            $couponItems  = $couponData ? json_decode($couponData, true) : [];
            //Coupon
            $couponCode         = isset($couponItems['code'])        ? $couponItems['code']         : '';
            $couponDiscount     = isset($couponItems['discount'])    ? $couponItems['discount']     : null;
            $couponType         = isset($couponItems['type'])        ? $couponItems['type']         : null;
            $couponProductIds   = isset($couponItems['product_ids']) ? $couponItems['product_ids']  : null;

            $cartRawData = [];

            //Cart total
            $total = 0;

            $isDiscountByProduct = false;
            foreach ($cartItems as $key => $item) {
                $isDiscountByProduct = false;
                $productInfo = ProductSizeModel::with('color.product')->find($item->product_id);
                $quantity    = $item->quantity ?? 0;

                //Count total each product
                $unitPrice = $productInfo->color->price;
                $subTotal  = $unitPrice * $quantity;

                //Check coupon for each product_ids
                $product_id = $productInfo->color->product->id;
                if ($couponProductIds != null || $couponProductIds != '') {
                    // Decoding the comma-separated product IDs into an array
                    $couponProductIdList = explode(',', $couponProductIds);

                    // Checking if any of the product IDs in $cartItems exist in $couponProductIds
                    if (in_array($product_id, $couponProductIdList)) {
                        $isDiscountByProduct = true;
                    }

                    //Get discount
                    if ($couponDiscount && $couponDiscount > 0 && $couponProductIds && $isDiscountByProduct) {
                        if ($couponType) {
                            if ($couponType == 'amount') {
                                $subTotal = $subTotal - $couponDiscount;
                            } elseif ($couponType == 'percent' && $couponDiscount <= 100) {
                                $subTotal = $subTotal - ($subTotal * $couponDiscount / 100);
                            }
                        }
                    }
                }
                //Total calc
                $total += $subTotal;

                $cartRawData[] = [
                    'info'        => $item->product_id,
                    'id'          => $productInfo->color->product->id,
                    'product'     => $productInfo->color->product->name ?? 'Trống',
                    'thumbnail'   => $productInfo->color->image ?? '',
                    'slug'        => $productInfo->color->product->slug,
                    'color'       => $productInfo->color->name ?? 'Trống',
                    'size'        => $productInfo->name ?? 'Trống',
                    'price'       => $unitPrice,
                    'quantity'    => $quantity,
                    'sub_total'   => $subTotal
                ];
            }

            //No have product_ids -> Giảm thẳng giá cuối
            if ($couponDiscount && $couponDiscount > 0 && !$couponProductIds && !$isDiscountByProduct) {
                if ($couponType) {
                    if ($couponType == 'amount') {
                        $total = $total - $couponDiscount;
                    } elseif ($couponType == 'percent' && $couponDiscount <= 100) {
                        $total = $total - ($total * $couponDiscount / 100);
                    }
                }
            }

            return response()->json(['error' => 0, 'carts' => $cartRawData, 'total' => $total, 'coupon' => $couponCode]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    private function checkQuantityAvailable($currentQuantity, $availableQuantity)
    {
        if ($availableQuantity == 0) {
            throw new \Exception("Sản phẩm đã hết hàng!!");
        }

        if ($currentQuantity > $availableQuantity) {
            throw new \Exception("Kho chỉ còn lại {$availableQuantity} sản phẩm");
        }
    }

    private function checkCouponAvailable($couponProductIds, $cartItems)
    {
        if ($couponProductIds === null || $couponProductIds == '') {
            return true;
        }

        // Decoding the comma-separated product IDs into an array
        $couponProductIdList = explode(',', $couponProductIds);

        // Checking if any of the product IDs in $cartItems exist in $couponProductIds
        foreach ($cartItems as $item) {
            if (in_array($item['product_id'], $couponProductIdList)) {
                return true;
            }
        }

        // None of the product IDs in $cartItems exist in $couponProductIds
        return false;
    }
}
