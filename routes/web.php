<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('magic.index');
});

// صفحات عامة (متاحة للجميع)
Route::view('/about', 'magic.about')->name('about');
Route::view('/gallery', 'magic.gallery')->name('gallery');

Route::view('/contact', 'magic.contact')->name('contact');

// مسارات الادمن فقط
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// مسارات الادمن والعميل معاً
Route::middleware(['auth', 'role:admin,customer'])->group(function () {
    Route::resource('orders', OrderController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// تسجيل الدخول والتسجيل Jetstream
require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
