<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\HomeController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('easy-free-returns', [HomeController::class, 'returns'])->name('easy-free-returns');
Route::get('account', [HomeController::class, 'account'])->name('account');
Route::get('order-status', [HomeController::class, 'orderStatus'])->name('order-status');
Route::get('category', [HomeController::class, 'category'])->name('category');
Route::get('my-account', [HomeController::class, 'myAccount'])->name('my-account');
Route::get('wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('registration', [HomeController::class, 'registration'])->name('registration');

Route::middleware('auth')->group(function () {

});
