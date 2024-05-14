<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductSizeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        return view('web.cart.index');
    }

    public function checkout()
    {
        return view('web.cart.checkout');
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
            $cookie = Cookie::make('cart_data', $serializedCartData, 60 * 24 * 7); //7 days

            return response()->json(['error' => 0, 'message' => "Thêm vào giỏ hàng thành công"])->withCookie($cookie);
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

            $cartItems = json_decode($cartData);

            $cartRawData = [];

            //Cart total
            $total = 0;

            foreach ($cartItems as $key => $item) {
                $productInfo = ProductSizeModel::with('color.product')->find($item->product_id);
                $quantity    = $item->quantity ?? 0;

                //Count total each product
                $unitPrice = $productInfo->color->price;
                $subTotal  = $unitPrice * $quantity;

                //Total calc
                $total += $subTotal;

                $cartRawData[] = [
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

            return response()->json(['error' => 0, 'carts' => $cartRawData, 'total' => $total]);
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
}
