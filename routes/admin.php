<?php

use App\Http\Controllers\admin\CouponController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\LoginController;
use \App\Http\Controllers\admin\DashboardController;


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dologin', [LoginController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('check-admin-auth')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::put('update/{id}', [CouponController::class, 'update'])->name('coupon.update');
        Route::post('store', [CouponController::class, 'store'])->name('coupon.store');
        Route::delete('destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');
    });
});

Route::post('ckeditor/upload', [DashboardController::class, 'upload'])->name('ckeditor.image-upload');
