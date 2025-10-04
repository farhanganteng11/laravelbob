<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProdukController;
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

require __DIR__.'/auth.php';
