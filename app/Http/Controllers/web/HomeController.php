<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AdvertisementModel;
use App\Models\AdvertisementProductModel;
use App\Models\AlbumModel;
use App\Models\BannerModel;
use App\Models\Category;
use App\Models\CollectionModel;
use App\Models\CollectionProductModel;
use App\Models\FooterBlog;
use App\Models\InforShopModel;
use App\Models\PostsModel;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInterestModel;
use App\Models\ReviewFeedbackModel;
use App\Models\Searches;
use App\Models\ReviewImageModel;
use App\Models\ReviewModel;
use App\Models\StylingImageModel;
use App\Models\StylingModel;
use App\Models\StylingProductModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        return view('web.home.index');
    }

    public function shippingInfo()
    {
        $data = InforShopModel::where('type',0)->first();
        $type = 0;
        return view('web.info.shipping',compact('data','type'));
    }
    public function returns()
    {
        $data = InforShopModel::where('type',1)->first();
        $type = 1;
        return view('web.info.return',compact('data','type'));
    }
    public function account()
    {
        $data = InforShopModel::where('type',2)->first();
        $type = 2;
        return view('web.info.account',compact('data','type'));
    }
    public function orderStatus()
    {
        $type = 4;
        return view('web.info.order-status',compact('type'));
    }
    public function FAQ()
    {
        $data = InforShopModel::where('type',3)->first();
        $type = 3;
        return view('web.info.faq',compact('data','type'));
    }
    public function productFeatures()
    {
        return view('web.product-features');
    }

    public function strapAdjuster()
    {
        return view('web.strap-adjuster');
    }

}
