<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\LoginController;
use \App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomepageSettingsController;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dologin', [LoginController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('check-admin-auth')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');

    //COUPON
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::post('store', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::put('update/{id}', [CouponController::class, 'update'])->name('coupon.update');
        Route::delete('destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');
    });

    //CATEGORY
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //HOMEPAGE SETTINGS
    Route::group(['prefix' => 'settings'], function () {
        Route::get('banner', [HomepageSettingsController::class, 'banner'])->name('settings.banner');
        Route::post('banner', [HomepageSettingsController::class, 'bannerUpdate'])->name('settings.banner.update');
        Route::get('shop-by-style', [HomepageSettingsController::class, 'shopByStyle'])->name('settings.shop.by.style');
        Route::post('shop-by-style', [HomepageSettingsController::class, 'shopByStyleUpdate'])->name('settings.shop.by.style.update');
        Route::put('shop-by-style/{key}', [HomepageSettingsController::class, 'shopByStyleListUpdate'])->name('settings.shop.by.style.update.list');
        Route::delete('shop-by-style/{key}', [HomepageSettingsController::class, 'shopByStyleDestroy'])->name('settings.shop.by.style.destroy');
        Route::get('sale-along', [HomepageSettingsController::class, 'saleAlong'])->name('settings.sale.along');
        Route::get('favorites', [HomepageSettingsController::class, 'favorites'])->name('settings.favorites');
        Route::get('adventurous', [HomepageSettingsController::class, 'adventurous'])->name('settings.adventurous');
    });
});

Route::post('ckeditor/upload', [DashboardController::class, 'upload'])->name('ckeditor.image-upload');
