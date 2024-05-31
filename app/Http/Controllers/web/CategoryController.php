<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductAdvertisingModel;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ReviewModel;
use App\Models\TechnologyModel;
use App\Models\WishListsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $productQuery = ProductModel::where('category_id', $category->id)
            ->where('display', 1)
            ->orderBy('created_at', 'desc');
        $product = $productQuery->paginate(20);
        foreach ($product as $pro){
            $pro->color = ProductColorModel::where('product_id',$pro->id)->get();
            $pro->wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$pro->id)->first();
            $this->starReview($pro);
        }
        $count_product = ProductModel::where('category_id',$category->id)->where('display',1)->count();
        $product_hot = ProductModel::where('category_id',$category->id)->where('display',1)->where('is_hot',1)->get();
        foreach ($product_hot as $hot){
            $hot->color = ProductColorModel::where('product_id',$hot->id)->get();
            $hot->wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$hot->id)->first();
        }
        $productIds = ProductModel::where('category_id', $category->id)->where('display', 1)->pluck('id')->toArray();
        $colors = ProductColorModel::whereIn('product_id', $productIds)
            ->select('name')
            ->distinct()
            ->get();
        $styles = ProductModel::where('category_id', $category->id)
            ->where('display', 1)
            ->distinct()
            ->get('style');
        $color_ids = ProductColorModel::whereIn('product_id',$productIds)->pluck('id')->toArray();
        $sizes = ProductSizeModel::whereIn('color_id', $color_ids)
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('product_size')
                    ->groupBy('name');
            })->get();
        $product_advertising = ProductAdvertisingModel::where('category_id',$category->id)->get();
        return view('web.category.index',compact('product','category','count_product','product_hot',
            'colors','styles','sizes','product_advertising'));
    }

    public function search(Request $request)
    {
        $key_search = $request->get('key_search');
        $data = ProductModel::where('name','like','%' . $request->get('key_search').'%')->where('display', 1)->paginate(20);
        foreach ($data as $items){
            $items->color = ProductColorModel::where('product_id',$items->id)->get();
            $items->wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$items->id)->first();
            $this->starReview($items);
        }
        $product = ProductModel::inRandomOrder()->take(8)->get();
        foreach ($product as $item){
            $item->color = ProductColorModel::where('product_id',$item->id)->first();
        }
        $productIds = ProductModel::where('name','like','%' . $request->get('key_search').'%')->where('display', 1)->pluck('id')->toArray();
        $colors = ProductColorModel::whereIn('product_id', $productIds)
            ->select('name')
            ->distinct()
            ->get();
        $styles = ProductModel::where('name','like','%' . $request->get('key_search').'%')
            ->where('display', 1)
            ->distinct()
            ->get('style');
        $color_ids = ProductColorModel::pluck('id')->toArray();
        $sizes = ProductSizeModel::whereIn('color_id', $color_ids)
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('product_size')
                    ->groupBy('name');
            })->get();
        if (count($data)>0){
            return view('web.category.list-search',compact('data','key_search','colors','styles','sizes'));
        }else{
            return view('web.category.search',compact('product'));
        }
    }

    public function keySearch(Request $request)
    {
        $data = ProductModel::where('name','like','%' . $request->get('key').'%')->take(5)->get();
        foreach ($data as $item){
            $item->money = ProductColorModel::where('product_id',$item->id)->first();
        }
        return \response()->json(['data' => $data,'status'=>true]);
    }

    public function filter(Request $request)
    {
        try {
            $query = ProductModel::query();

            if ($request->has('size_name')) {
                $sizeId = ProductSizeModel::where('name', $request->size_name)->pluck('color_id')->toArray();
                $colorsId = ProductColorModel::whereIn('id', $sizeId)->pluck('product_id')->toArray();
                $query->whereIn('id', $colorsId);
            }

            if ($request->has('type_width')) {
                $query->where('type', $request->type_width);
            }

            if ($request->has('style_name')) {
                $query->where('style', $request->style_name);
            }

            if ($request->has('color_id')) {
                $colorId = ProductColorModel::where('name', $request->color_id)->pluck('product_id')->toArray();
                $query->whereIn('id', $colorId);
            }

            if ($request->has('price_id')) {
                $priceRanges = [
                    1 => [0, 300000],
                    2 => [300000, 600000],
                    3 => [600000, 1000000],
                    4 => [1000000, 3000000]
                ];

                $selectedRange = $priceRanges[$request->price_id] ?? null;
                if ($selectedRange) {
                    $query->whereHas('productColors', function ($q) use ($selectedRange) {
                        $q->where(function ($query) use ($selectedRange) {
                            $query->where(function ($query) use ($selectedRange) {
                                $query->where('promotional_price', '>', 0)
                                    ->whereBetween('promotional_price', $selectedRange);
                            })->orWhere(function ($query) use ($selectedRange) {
                                $query->where('promotional_price', 0)
                                    ->whereBetween('price', $selectedRange);
                            });
                        });
                    });
                }

            }
            if ($request->has('sort')) {
                if ($request->sort == 1) {
                    $query->orderBy('created_at', 'desc');
                } elseif ($request->sort == 2) {
                    $query->orderBy(
                        ProductColorModel::select('price')
                            ->whereColumn('product_color.product_id', 'products.id')
                            ->orderBy('price', 'asc')
                            ->limit(1)
                        , 'asc');
                } elseif ($request->sort == 3) {
                    $query->orderBy(
                        ProductColorModel::select('price')
                            ->whereColumn('product_color.product_id', 'products.id')
                            ->orderBy('price', 'desc')
                            ->limit(1)
                        , 'desc');
                }
            }

            if ($request->has('key_search')) {
                $query->where('name','like','%' . $request->get('key_search').'%');
            }

            $product = $query->paginate(20);
            foreach ($product as $pro){
                $pro->color = ProductColorModel::where('product_id',$pro->id)->get();
                $pro->wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$pro->id)->first();
                $this->starReview($pro);
            }

            $view = view('web.category.items-product', compact('product'))->render();
            return response()->json(['status' => true, 'prop' => $view,'count_data'=>count($product)]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function starReview($product)
    {
        $product->star = 0;
        $star = ReviewModel::where('product_id', $product->id)->orderBy('created_at','desc')->get();
        if (!$star->isEmpty()) {
            $total_score =  ReviewModel::where('product_id', $product->id)->sum('star');
            $total_votes = count($star);
            $product->star = round($total_score/$total_votes, 1);
            $product->count_star = count($star);
        }
        return $star;
    }

    public function technology($slug)
    {
        $technology = TechnologyModel::where('slug', $slug)->first();
        return view('web.technology.index',compact('technology'));
    }
}
