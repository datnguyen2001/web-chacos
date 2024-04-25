<?php

namespace App\Providers;

use App\Enums\CouponStatus;
use App\Models\Coupon;
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

            // Configure the data for the view
            $view->with('coupons', $coupons);
        });
    }
}
