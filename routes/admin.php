<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CouponController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\LoginController;
use \App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomepageSettingsController;
use \App\Http\Controllers\admin\ProductController;
use \App\Http\Controllers\admin\InforShopController;

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

    //PRODUCT
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('delete-img', [ProductController::class, 'deleteImg']);
        Route::get('delete-color/{id}', [ProductController::class, 'deleteColor']);
        Route::get('delete-size/{id}', [ProductController::class, 'deleteSize']);
    });

    //HOMEPAGE SETTINGS
    Route::group(['prefix' => 'settings'], function () {
        //BANNER
        Route::get('banner', [HomepageSettingsController::class, 'banner'])->name('settings.banner');
        Route::post('banner', [HomepageSettingsController::class, 'bannerUpdate'])->name('settings.banner.update');
        //SALE-ALONG
        Route::get('sale-along', [HomepageSettingsController::class, 'saleAlong'])->name('settings.sale.along');
        Route::post('sale-along', [HomepageSettingsController::class, 'saleAlongUpdate'])->name('settings.sale.along.update');
        //SHOP BY STYLE
        Route::get('shop-by-style', [HomepageSettingsController::class, 'shopByStyle'])->name('settings.shop.by.style');
        Route::post('shop-by-style', [HomepageSettingsController::class, 'shopByStyleUpdate'])->name('settings.shop.by.style.update');
        Route::post('shop-by-style-reorder', [HomepageSettingsController::class, 'shopByStyleListReorder'])->name('settings.shop.by.style.list.reorder');
        Route::put('shop-by-style/{key}', [HomepageSettingsController::class, 'shopByStyleListUpdate'])->name('settings.shop.by.style.update.list');
        Route::delete('shop-by-style/{key}', [HomepageSettingsController::class, 'shopByStyleDestroy'])->name('settings.shop.by.style.destroy');
        //FAVORITES
        Route::get('favorites', [HomepageSettingsController::class, 'favorites'])->name('settings.favorites');
        Route::post('favorites', [HomepageSettingsController::class, 'favoritesUpdate'])->name('settings.favorites.update');
        //BOX AROUND
        Route::get('box-around', [HomepageSettingsController::class, 'boxAround'])->name('settings.box.around');
        Route::post('box-around', [HomepageSettingsController::class, 'boxAroundUpdate'])->name('settings.box.around.update');
        //Key search
        Route::get('key-search', [HomepageSettingsController::class, 'indexSearch'])->name('settings.key-search');
        Route::post('store-key-search', [HomepageSettingsController::class, 'storeSearch'])->name('settings.store.key-search');
        Route::put('update-key-search/{id}', [HomepageSettingsController::class, 'updateSearch'])->name('settings.update.key-search');
        Route::get('destroy-key-search/{id}', [HomepageSettingsController::class, 'destroySearch'])->name('settings.destroy.key-search');
        //Key search
        Route::get('product-advertising', [HomepageSettingsController::class, 'indexAdvertising'])->name('settings.product-advertising');
        Route::post('store-product-advertising', [HomepageSettingsController::class, 'storeAdvertising'])->name('settings.store.product-advertising');
        Route::put('update-product-advertising/{id}', [HomepageSettingsController::class, 'updateAdvertising'])->name('settings.update.product-advertising');
        Route::get('destroy-product-advertising/{id}', [HomepageSettingsController::class, 'destroyAdvertising'])->name('settings.destroy.product-advertising');
    });

    Route::group(['prefix' => 'infor-shop'], function () {
        Route::get('index/{type}', [InforShopController::class, 'index'])->name('infor-shop.index');
        Route::post('update/{type}', [InforShopController::class, 'save'])->name('infor-shop.update');
    });
});

Route::post('ckeditor/upload', [DashboardController::class, 'upload'])->name('ckeditor.image-upload');
