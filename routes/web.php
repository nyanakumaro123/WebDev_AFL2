<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User Route
Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// // Admin Route
// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['admin'])->name('admin');

Route::middleware('admin')->group(function () {
    Route::get('/product_list_view', [ProductController::class, 'productListView'])->name('product.list.view');
    Route::get('/product_create_view', [ProductController::class, 'createView'])->name('product.create.view');
    Route::post('/create_product', [ProductController::class, 'create'])->name('create.product');
    Route::get('/product_update_view/{id}', [ProductController::class, 'updateView'])->name('product.update.view');
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/product/{id}/delete', [ProductController::class, 'delete'])->name('delete.product');
    
    Route::get('/brand_list_view', [BrandController::class, 'brandListView'])->name('brand.list.view');
    Route::get('/brand_create_view', [BrandController::class, 'createView'])->name('brand.create.view');
    Route::post('/create_brand', [BrandController::class, 'create'])->name('create.brand');
    Route::get('/brand_update_view/{id}', [BrandController::class, 'updateView'])->name('brand.update.view');
    Route::put('/brand/{id}/update', [BrandController::class, 'update'])->name('update.brand');
    Route::delete('/brand/{id}/delete', [BrandController::class, 'delete'])->name('delete.brand');
    
    Route::get('/category_list_view', [CategoryController::class, 'categoryListView'])->name('category.list.view');
    Route::get('/category_create_view', [CategoryController::class, 'createView'])->name('category.create.view');
    Route::post('/create_category', [CategoryController::class, 'create'])->name('create.category');
    Route::get('/category_update_view/{id}', [CategoryController::class, 'updateView'])->name('category.update.view');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('update.category');
    Route::delete('/category/{id}/delete', [CategoryController::class, 'delete'])->name('delete.category');

});

require __DIR__.'/auth.php';
