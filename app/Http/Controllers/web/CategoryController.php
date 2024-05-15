<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ReviewModel;
use App\Models\WishListsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $productIds = $productQuery->pluck('id')->toArray();
        $colors = ProductColorModel::whereIn('product_id',$productIds)->distinct('name')->get();
        $styles = $productQuery->distinct('style')->get();
        $color_ids = ProductColorModel::whereIn('product_id',$productIds)->pluck('id')->toArray();
        $sizes = ProductSizeModel::whereIn('color_id',$color_ids)->distinct('name')->get();
        return view('web.category.index',compact('product','category','count_product','product_hot',
            'colors','styles','sizes'));
    }

    public function search()
    {
        return view('web.category.search');
    }

    public function filter(Request $request)
    {
        try {
            $query = ProductModel::query();

            if ($request->has('size_name')) {
                $sizeId = ProductSizeModel::where('name', $request->size_name)->pluck('id')->toAray();
                $query->whereIn('size_id', $sizeId);
            }

            if ($request->has('type_width')) {
                $query->where('type', $request->type_width);
            }

            if ($request->has('style_name')) {
                $query->where('style', $request->style_name);
            }

            if ($request->has('color_id')) {
                $colorId = ProductColorModel::where('name', $request->color_id)->pluck('id')->toArray;
                $query->whereIn('color_id', $colorId);
            }

            if ($request->has('price_id')) {
                if ($request->price_id == 1) {
                    $query->whereHas('productColors', function($q) {
                        $q->whereBetween('price', [0, 300000]);
                    });
                } elseif ($request->price_id == 2) {
                    $query->whereHas('productColors', function($q) {
                        $q->whereBetween('price', [300000, 600000]);
                    });
                }
            }
            if ($request->has('sort')) {
                $query->orderBy('name', $request->sort);
            }

            $product = $query->get();
            dd($product);
            $view = view('web.category.items-product', compact('product'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
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
}
