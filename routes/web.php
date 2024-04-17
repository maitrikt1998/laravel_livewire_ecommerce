<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Category;
use App\Livewire\Admin\Product;

Route::get('/', [HomeController::class,'homepage'])->name('homepage');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/admin/home',[AdminController::class,'index'])->name('admin.home');
Route::get('/admin/category',Category::class)->name('admin.categories');
Route::get('/admin/products',Product::class)->name('admin.products');


Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');


