<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\HomeController;
use \App\Http\Controllers\web\LoginController;
use \App\Http\Controllers\web\CategoryController;
use \App\Http\Controllers\web\MyAccountController;
use \App\Http\Controllers\web\ProductController;
use \App\Http\Controllers\web\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('dang-nhap', [LoginController::class, 'login'])->name('login');
    Route::post('dang-nhap', [LoginController::class, 'signIn'])->name('sign-in');
    Route::get('dang-ky', [LoginController::class, 'registration'])->name('registration');
    Route::post('dang-ky', [LoginController::class, 'signUp'])->name('sign-up');
});

Route::middleware('auth')->group(function () {
    Route::get('tai-khoan-cua-toi', [MyAccountController::class, 'index'])->name('my-account');
    Route::get('chinh-sua-tai-khoan', [MyAccountController::class, 'editAccount'])->name('edit-account');
    Route::get('dia-chi', [MyAccountController::class, 'address'])->name('address-account');
    Route::get('lich-su-don-hang', [MyAccountController::class, 'orderHistory'])->name('order-history');
    Route::get('danh-sach-yeu-thich', [MyAccountController::class, 'wishlist'])->name('wishlist');

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('shipping-info', [HomeController::class, 'shippingInfo'])->name('shipping-info');
Route::get('easy-free-returns', [HomeController::class, 'returns'])->name('easy-free-returns');
Route::get('account', [HomeController::class, 'account'])->name('account');
Route::get('order-status', [HomeController::class, 'orderStatus'])->name('order-status');
Route::get('faq', [HomeController::class, 'FAQ'])->name('faq');
Route::get('product-features', [HomeController::class, 'productFeatures'])->name('product-features');
Route::get('strap-adjuster', [HomeController::class, 'strapAdjuster'])->name('strap-adjuster');

Route::get('danh-muc', [CategoryController::class, 'category'])->name('category');
Route::get('chi-tiet-san-pham', [ProductController::class, 'index'])->name('detail-product');
Route::get('gio-hang', [CartController::class, 'index'])->name('cart');
Route::get('tim-kiem', [CategoryController::class, 'search'])->name('search');
