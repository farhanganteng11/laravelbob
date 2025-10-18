<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController; // ✅ Tambahkan ini
use Illuminate\Support\Facades\Route;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk tugas praktikum produk (BISA DIAKSES TANPA LOGIN)
Route::get('/produk/{id}', [ProdukController::class, 'show']);

// Group route dengan middleware auth
Route::middleware(['auth'])->group(function () {
    // Profile bawaan Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Route untuk Artikel (CRUD)
    Route::resource('articles', ArticleController::class);
});

// ✅ Praktikum Form Product
Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
Route::post('/product', [ProductController::class, 'store'])->name('product-store');
Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product-edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product-update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product-destroy');

require __DIR__.'/auth.php';
