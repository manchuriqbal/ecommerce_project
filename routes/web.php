<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'home'])->name('home.home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin'])->name('admin.dashboard');
Route::get('show_products', [HomeController::class, 'show_products'])->name('home.products');
Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('home.product_details');
Route::get('add_to_cart/{id}', [HomeController::class, 'add_to_cart'])->middleware(['auth', 'verified'])->name('home.add_to_cart');
Route::get('my_cart/', [HomeController::class, 'my_cart'])->middleware(['auth', 'verified'])->name('home.my_cart');
Route::delete('cart_item_delete/{id}', [HomeController::class, 'cart_item_delete'])->middleware(['auth', 'verified'])->name('home.cart_item_delete');


Route::get('admin/category', [AdminController::class, 'create'])->middleware(['auth','admin'])->name('category.create');
Route::post('admin/category', [AdminController::class, 'store'])->middleware(['auth','admin'])->name('category.store');
Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->middleware(['auth','admin'])->name('category.delete');
Route::get('admin/edit_category/{id}', [AdminController::class, 'edit'])->middleware(['auth','admin'])->name('category.edit');
Route::put('admin/update_category/{id}', [AdminController::class, 'update'])->middleware(['auth','admin'])->name('category.update');
Route::get('admin/add_product', [AdminController::class, 'add_product'])->middleware(['auth','admin'])->name('product.add');
Route::post('admin/store_product', [AdminController::class, 'store_product'])->middleware(['auth','admin'])->name('product.store');
Route::get('admin/view_products', [AdminController::class, 'view_products'])->middleware(['auth','admin'])->name('product.view');
Route::get('admin/edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth','admin'])->name('product.edit');
Route::put('admin/update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth','admin'])->name('product.update');
Route::delete('admin/delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth','admin'])->name('product.delete');
Route::post('admin/search_product', [AdminController::class, 'search_product'])->middleware(['auth','admin'])->name('product.search');


