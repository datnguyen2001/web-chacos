<?php

namespace App\Providers;

use App\Enums\CouponStatus;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\KeySearchModel;
use App\Models\TodayOfferModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CouponServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('web.partials.header', function ($view) {
            //Make sure coupon is available
            $coupons = Coupon::where('status', CouponStatus::ACTIVE)
                ->where('end_date', '>', Carbon::now())->get();

            //Category
            $categories = Category::with('children')->get();

            $key_search = KeySearchModel::all();

            $today_offer = TodayOfferModel::all();

            // Configure the data for the view
            $view->with('coupons', $coupons);
            $view->with('categories', $categories);
            $view->with('key_search', $key_search);
            $view->with('today_offer', $today_offer);
        });
    }
}
