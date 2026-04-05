<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('home');
    Route::resource('customers', CustomerController::class);
});

Route::middleware('guest')->group(function () {
    // Register routes
    Route::get('register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    // authentication routes
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
