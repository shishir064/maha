<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TypesController;
use App\Livewire\ContactForm;
use App\Livewire\Setting\Index;
use App\Models\Types;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//contact route
Route::view('/contact', 'pages.contact')->name('contact');

//cart route
Route::view('/cart', 'pages.cart')->name('cart');

//product route
Route::view('/products', 'pages.products')->name('products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// category route
route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
route::post('admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
route::PUT('admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
route::delete('admin/category/{category}', [CategoryController::class, 'delete'])->name('admin.category.destroy');
route::get('admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');

//brand route
route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
route::post('admin/brand', [BrandController::class, 'store'])->name('admin.brand.store');
route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand.index');
route::PUT('admin/brand/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
route::delete('admin/brand/{brand}', [BrandController::class, 'delete'])->name('admin.brand.destroy');
route::get('admin/brand/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brand.edit');

// products route
route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');
route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
route::PUT('admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
route::delete('admin/products/{product}', [ProductController::class, 'delete'])->name('admin.products.destroy');

// audiance type route
route::get('admin/types',[TypesController::class, 'index'])->name('admin.types.index');
route::post('admin/types', [TypesController::class, 'store'])->name('admin.types.store');
route::get('admin/types/create', [TypesController::class, 'create'])->name('admin.types.create');
route::get('admin/types/{type}/edit', [TypesController::class, 'edit'])->name('admin.types.edit');
route::PUT('admin/types/{type}', [TypesController::class, 'update'])->name('admin.types.update');
route::delete('admin/types/{type}', [TypesController::class, 'delete'])->name('admin.types.destroy');


//Setting route

Route::get('settings', [SettingController::class, 'index'])->name('setting.index');
Route::post('settings/create', [SettingController::class, 'store'])->name('setting.store');


require __DIR__.'/auth.php';
