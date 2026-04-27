<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
Route::fallback(fn () => redirect()->route('auth.login'));
Route::name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/login', 'login')->name('submit-login');
    Route::post('/register', 'register')->name('submit-register');
    Route::post('/logout', 'logout')->name('logout');
Route::name('app.')->middleware('auth')->group(function () {
    Route::get('/homepage', fn () => view('app.homepage'))->name('homepage');
});
Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
});
