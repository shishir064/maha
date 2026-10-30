<?php
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandfeaturedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryfeaturedController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SuperAdmin\MaintenanceController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\Messages\Index;
use App\Livewire\Admin\Messages\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//contact route
Route::view('/contact', 'pages.contact')->name('contact');

//About route
Route::view('/about', 'pages.about')->name('about');

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
route::put('admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
route::delete('admin/category/{category}', [CategoryController::class, 'delete'])->name('admin.category.destroy');
route::get('admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');

//brand route
route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
route::post('admin/brand', [BrandController::class, 'store'])->name('admin.brand.store');
route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand.index');
route::put('admin/brand/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
route::delete('admin/brand/{brand}', [BrandController::class, 'delete'])->name('admin.brand.destroy');
route::get('admin/brand/{id}/edit', [BrandController::class, 'edit'])->name('admin.brand.edit');

// products route
route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');
route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
route::put('admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
route::delete('admin/products/{product}', [ProductController::class, 'delete'])->name('admin.products.destroy');

// audiance type route
route::get('admin/types',[TypesController::class, 'index'])->name('admin.types.index');
route::post('admin/types', [TypesController::class, 'store'])->name('admin.types.store');
route::get('admin/types/create', [TypesController::class, 'create'])->name('admin.types.create');
route::get('admin/types/{type}/edit', [TypesController::class, 'edit'])->name('admin.types.edit');
route::PUT('admin/types/{type}', [TypesController::class, 'update'])->name('admin.types.update');
route::delete('admin/types/{type}', [TypesController::class, 'delete'])->name('admin.types.destroy');

// advertisement route

Route::get(
    '/admin/advertisement/items/{type}',
    [AdvertisementController::class, 'items']
)->name('admin.advertisement.items');
route::get('admin/advertisement/create', [AdvertisementController::class, 'create'])->name('admin.advertisement.create');
route::get('admin/advertisement/{advertisement}/edit', [AdvertisementController::class, 'edit'])->name('admin.advertisement.edit');
route::post('admin/advertisement', [AdvertisementController::class, 'store'])->name('admin.advertisement.store');
route::get('admin/advertisement', [AdvertisementController::class, 'index'])->name('admin.advertisement.index');
route::put('admin/advertisement/{advertisement}', [AdvertisementController::class, 'update'])->name('admin.advertisement.update');
route::delete('admin/advertisement/{advertisement}', [AdvertisementController::class, 'delete'])->name('admin.advertisement.destroy');
// slider route
route::resource('admin/sliders', SliderController::class)->names('admin.sliders');
route::resource('admin/users',UserController::class)->names('admin.users');

//Setting route
Route::get('setting', [SettingController::class, 'index'])->name('settings.index');
Route::post('setting/create', [SettingController::class, 'store'])->name('settings.store');

//Blog route
Route::prefix('super-admin')->name('super-admin.')->group(function () {
        Route::view('/blogs/create', 'pages.blog')->name('blogs.create');
    });
 //roles route
   Route::get('admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
   route::get('admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
   route::get('admin/roles/{id}', [RoleController::class, 'show'])->name('admin.roles.show');
   route::post('admin/roles/{id}', [RoleController::class, 'assign'])->name('admin.roles.assign');
   Route::post('admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
   route::put('admin/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
   route::get('admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
   route::delete('admin/roles/{role}', [RoleController::class, 'delete'])->name('admin.roles.destroy');
   
//permission route
route::resource('admin/permissions', PermissionController::class)->names('admin.permissions');
route::post('admin/permissions/{role}', [PermissionController::class, 'assign'])->name('admin.permissions.assign');

// brand featured section
Route::get('/admin/brandfeatured/create',[BrandfeaturedController::class, 'create'])->name('admin.brandfeatured.create');
Route::post('/admin/brandfeatured', [brandfeaturedController::class, 'store'])->name('admin.brandfeatured.store');
Route::get('/admin/brandfeatured', [BrandfeaturedController::class, 'index'])->name('admin.brandfeatured.index');

// category featured section
Route::get('/admin/categoryfeatured/create',[CategoryfeaturedController::class, 'create'])->name('admin.categoryfeatured.create');
Route::post('/admin/categoryfeatured', [CategoryfeaturedController::class, 'store'])->name('admin.categoryfeatured.store');
Route::get('/admin/categoryfeatured', [CategoryfeaturedController::class, 'index'])->name('admin.categoryfeatured.index');

//super admin route
Route::post('/maintenance/toggle', [
    MaintenanceController::class,
    'toggle',
])->name('maintenance.toggle');


Route::view('/contact', 'pages.contact')->name('contact');
//admin message
Route::view('/admin/messages', 'pages.messages.index')
    ->name('admin.messages.index');

Route::get('/admin/messages/{id}', [MessageController::class, 'show'])
    ->name('admin.messages.show');

require __DIR__.'/auth.php';
