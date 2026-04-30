<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;

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
    Route::get('/shopping-cart', [CartController::class, 'index'])->name('shopping-cart');
    Route::post('/shopping-cart/add', [CartController::class, 'add'])->name('add-to-cart');
    Route::delete('/shopping-cart/remove/{id}', [CartController::class, 'remove'])->name('remove-from-cart');
    Route::get('/product-listing', [ProductController::class, 'showActive'])->name('product-listing');
    Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('view-product');
});

Route::name('app.')->middleware(['auth', 'not-guest'])->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
});

Route::name('search.')->controller(SearchController::class)->middleware(['auth'])->group(function () {
    Route::get('/product-listing/search', [SearchController::class, 'searchProductListing'])
        ->name('product-listing');
    Route::get('products/index/search', [SearchController::class, 'searchProductManagement'])
        ->name('product-management');
    Route::get('categories/index/search', [SearchController::class, 'searchCategoryManagement'])
        ->name('category-management');
    Route::get('users/index/search', [SearchController::class, 'searchUserManagement'])
        ->name('user-management');
    Route::get('orders/index/search', [SearchController::class, 'searchOrdersManagement'])
        ->name('orders-management');
});

Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});
