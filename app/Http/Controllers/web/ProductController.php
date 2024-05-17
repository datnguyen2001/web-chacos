<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductColorModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ReviewImageModel;
use App\Models\ReviewModel;
use App\Models\WishListsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $more->color = ProductColorModel::where('product_id',$more->id)->first();
        }
        $star = $this->starReview($product);
        $star_five = ReviewModel::where('product_id', $product->id)->where('star', 5)->count();
        $star_four = ReviewModel::where('product_id', $product->id)->where('star', 4)->count();
        $star_three = ReviewModel::where('product_id', $product->id)->where('star', 3)->count();
        $star_two = ReviewModel::where('product_id', $product->id)->where('star', 2)->count();
        $star_one = ReviewModel::where('product_id', $product->id)->where('star', 1)->count();
        $percent_5 = 0;
        $percent_4 = 0;
        $percent_3 = 0;
        $percent_2 = 0;
        $percent_1 = 0;
        if ($star_five > 0){
            $percent_5 = round(($star_five / count($star)) * 100,0);
        }
        if ($star_four > 0){
            $percent_4 = round(($star_four / count($star)) * 100,0);
        }
        if ($star_three > 0){
            $percent_3 = round(($star_three / count($star)) * 100,0);
        }
        if ($star_two > 0){
            $percent_2 = round(($star_two / count($star)) * 100,0);
        }
        if ($star_one > 0){
            $percent_1 = round(($star_one / count($star)) * 100,0);
        }
        return view('web.product.index',compact('product','product_image','product_color','product_size',
        'product_wish','product_more','star_five','star_four','star_three','star_two','star_one','percent_5','percent_4',
            'percent_3','percent_2','percent_1','star'));
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

    public function saveWish(Request $request)
    {
        try {
            if (Auth::check()){
                $item_wish = WishListsModel::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
                if ($item_wish){
                    $item_wish->delete();
                }else{
                    $wish = new WishListsModel([
                        'user_id'=>Auth::id(),
                        'product_id'=>$request->product_id
                    ]);
                    $wish->save();
                }
                return response()->json(['status' => true, 'msg' => 'Thành công']);
            }else{
                return response()->json(['status' => false, 'msg' => 'Vui lòng đăng nhập để tiếp tục']);
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function saveReview(Request $request)
    {
        $review = new ReviewModel([
            'product_id'=>$request->product_id,
            'user_name'=>$request->name,
            'content'=>$request->get('content'),
            'star'=>$request->star,
        ]);
        $review->save();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            foreach ($file as $value) {
                $imagePath = Storage::url($value->store('review', 'public'));
                $review_image = new ReviewImageModel([
                    'review_id' =>$review->id,
                    'src' =>$imagePath,
                ]);
                $review_image->save();
            }
        }
        toastr()->success('Đánh giá thành công');
        return back();
    }

    public function getReview(Request $request)
    {
        $review = ReviewModel::query();
        $review = $review->where('product_id',$request->product_id)->orderBy('created_at','desc')->paginate(10);
        foreach($review as $item){
            $item->image = ReviewImageModel::where('review_id',$item->id)->get();
        }
        return response()->json(['status' => true, 'data' => $review]);
    }

    public function starReview($product)
    {
        $product->star = 0;
        $star = ReviewModel::where('product_id', $product->id)->orderBy('created_at','desc')->get();
        if (!$star->isEmpty()) {
            $total_score =  ReviewModel::where('product_id', $product->id)->sum('star');
            $total_votes = count($star);
            $product->star = round($total_score/$total_votes, 1);
        }
        return $star;
    }
}
