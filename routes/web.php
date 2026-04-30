<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::fallback(fn () => redirect()->route('auth.login'));

Route::name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/login', 'login')->name('submit-login');
    Route::post('/register', 'register')->name('submit-register');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/login-guest', 'loginAsGuest')->name('guest');
});

Route::name('app.')->middleware('auth')->group(function () {
    Route::get('/homepage', fn () => view('app.homepage'))->name('homepage');
    Route::get('/shopping-cart', fn () => view('app.shopping-cart'))->name('shopping-cart');
});

Route::name('app.')->middleware(['auth', 'not-guest'])->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
});

Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});
