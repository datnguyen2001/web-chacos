<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductColorModel;
use App\Models\ProductModel;
use App\Models\WishListsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $product = ProductModel::where('category_id',$category->id)->where('display',1)->paginate(20);
        foreach ($product as $pro){
            $pro->color = ProductColorModel::where('product_id',$pro->id)->get();
            $pro->wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$pro->id)->first();
        }
        $count_product = ProductModel::where('category_id',$category->id)->where('display',1)->count();
        $product_hot = ProductModel::where('category_id',$category->id)->where('display',1)->where('is_hot',1)->get();
        foreach ($product_hot as $hot){
            $hot->color = ProductColorModel::where('product_id',$hot->id)->get();
            $hot->wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$hot->id)->first();
        }
        return view('web.category.index',compact('product','category','count_product','product_hot'));
    }
    public function search()
    {
        return view('web.category.search');
    }
}
