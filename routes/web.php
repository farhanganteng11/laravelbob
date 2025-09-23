<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard umum setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile bawaan Laravel
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// User biasa dashboard
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return "Selamat datang, User!";
    })->name('user.dashboard');
});

// Route rahasia khusus admin
Route::get('/rahasia', function () {
    return 'Ini path rahasia hanya untuk admin!';
})->middleware(['auth', 'role:admin'])->name('rahasia');

// Product route khusus admin dan owner
Route::middleware(['auth'])->group(function () {
});
Route::get('/product/{angka}', [ProductController::class, 'index'])
    ->name('products.index');


require __DIR__.'/auth.php';
