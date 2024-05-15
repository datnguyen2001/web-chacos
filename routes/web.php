<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\MyAccountController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\CartController;

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
    Route::put('chinh-sua-tai-khoan/{id}', [MyAccountController::class, 'updateAccount'])->name('update-account');
    Route::get('dia-chi', [MyAccountController::class, 'address'])->name('address-account');
    Route::post('dia-chi', [MyAccountController::class, 'storeAddress'])->name('address-account-store');
    Route::put('dia-chi/{id}', [MyAccountController::class, 'updateAddress'])->name('address-account-update');
    Route::delete('dia-chi/{id}', [MyAccountController::class, 'destroyAddress'])->name('address-account-destroy');
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

Route::get('danh-muc/{slug?}', [CategoryController::class, 'category'])->name('category');
Route::post('bo-loc', [CategoryController::class,'filter'])->name('filter');
Route::get('chi-tiet-san-pham/{slug?}', [ProductController::class, 'index'])->name('detail-product');
Route::post('select-color', [ProductController::class,'selectColor'])->name('select-color');
Route::post('save-wish', [ProductController::class,'saveWish'])->name('save-wish');
Route::get('gio-hang', [CartController::class, 'index'])->name('cart');
Route::get('mua-hang', [CartController::class, 'checkout'])->name('checkout');
Route::get('hoan-thanh', [CartController::class, 'complete'])->name('complete');
Route::get('tim-kiem', [CategoryController::class, 'search'])->name('search');
Route::post('save-review', [ProductController::class, 'saveReview'])->name('save-review');
Route::get('get-review', [ProductController::class, 'getReview'])->name('get-review');

Route::get('cart', [CartController::class, 'getCartData'])->name('get.cart.data');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::put('update-cart-quantity', [CartController::class, 'updateCart'])->name('update.cart.quantity');
Route::delete('remove-product-cart', [CartController::class, 'removeProductInCart'])->name('remove.product.cart');