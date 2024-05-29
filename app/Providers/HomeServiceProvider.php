<?php

namespace App\Providers;

use App\Models\AdvertisementModel;
use App\Models\HomepageSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
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
        View::composer('web.home.index', function ($view) {
            $banner         = HomepageSettings::where('isActive', 1)->where('type', 'banner')->first();
            $shop_by_style  = HomepageSettings::where('isActive', 1)->where('type', 'shop_by_style')->first();
            $sale_along     = HomepageSettings::where('isActive', 1)->where('type', 'sale_along')->first();
            $favorites      = HomepageSettings::where('isActive', 1)->where('type', 'favorites')->first();
            $box_around     = HomepageSettings::where('isActive', 1)->where('type', 'box_around')->first();
            $advertisement     = AdvertisementModel::inRandomOrder()->first();

            // Configure the data for the view
            $view->with('banner', $banner);
            $view->with('shop_by_style', $shop_by_style);
            $view->with('sale_along', $sale_along);
            $view->with('favorites', $favorites);
            $view->with('box_around', $box_around);
            $view->with('advertisement', $advertisement);
        });
    }
}
