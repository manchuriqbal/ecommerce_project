<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin'])->name('admin.dashboard');
Route::get('admin/category', [AdminController::class, 'create'])->middleware(['auth','admin'])->name('category.create');
Route::post('admin/category', [AdminController::class, 'store'])->middleware(['auth','admin'])->name('category.store');
Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->middleware(['auth','admin'])->name('category.delete');
Route::get('admin/edit_category/{id}', [AdminController::class, 'edit'])->middleware(['auth','admin'])->name('category.edit');
Route::put('admin/update_category/{id}', [AdminController::class, 'update'])->middleware(['auth','admin'])->name('category.update');
Route::get('admin/add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin'])->name('product.add');
Route::post('admin/store_product', [AdminController::class, 'store_product'])->middleware(['auth','admin'])->name('product.store');
