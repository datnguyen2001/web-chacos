<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductColorModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\WishListsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = ProductModel::where('slug',$slug)->first();
        $product_image = ProductImageModel::where('product_id',$product->id)->get();
        $product_color = ProductColorModel::where('product_id',$product->id)->get();
        $product_size = ProductSizeModel::where('color_id',$product_color[0]->id)->get();
        $product_wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$product->id)->first();
        $product_more = ProductModel::where('slug',$slug)->where('id','!=',$product->id)->inRandomOrder()->take(8)->get();
        foreach ($product_more as $more){
            $more->color = ProductColorModel::where('product_id')->first();
        }
        return view('web.product.index',compact('product','product_image','product_color','product_size',
        'product_wish','product_more'));
    }

    public function selectColor(Request $request)
    {
        try {
            $product_size = ProductSizeModel::where('color_id',$request->color_id)->get();
            $view = view('web.product.items-size', compact('product_size'))->render();
            return response()->json(['status' => true, 'prop' => $view]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
