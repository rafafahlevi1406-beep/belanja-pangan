<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanPanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WeightedProductController;

// Halaman utama menuju login
Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman login
Route::get('/login', [
    LoginController::class,
    'showLoginForm'
])->name('login');

// Proses login
Route::post('/login', [
    LoginController::class,
    'login'
])->name('login.process');

// Proses logout
Route::post('/logout', [
    LoginController::class,
    'logout'
])->name('logout');

// Halaman yang hanya dapat dibuka setelah login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [
        BahanPanganController::class,
        'dashboard'
    ])->name('dashboard');

    // Perhitungan Weighted Product (WP)
    Route::get('/weighted-product', [
        WeightedProductController::class,
        'index'
    ])->name('weighted-product.index');

    // Manajemen belanja dan bahan pangan
    Route::resource('bahan-pangan', BahanPanganController::class);

});
