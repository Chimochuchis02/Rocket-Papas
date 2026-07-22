<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminUser;
use App\Http\Controllers\CarrouselController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Dish;
use App\Models\Banner;
use App\Models\Menu;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $productos = App\Models\Product::with('carrousel')->latest()->get();
    $promociones = Promotion::with('product')->where('is_Active',1)->latest()->get();
    $platillos = Dish::with('product')->where('is_Active', 1)->latest()->get();
    $bannerActivo = Banner::where('is_Active', 1)->first();
    $menuActivo = Menu::where('is_Active', 1)->first();
    return view('welcome', compact('bannerActivo' , 'menuActivo', 'productos', 'platillos', 'promociones'));
});

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(AdminUser::class)->name('dashboard');

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');

    Route::get('/productos/create', [ProductController::class, 'create'])->name('productos.create');

    Route::post('/productos/store', [ProductController::class, 'store'])->name('productos.store');

    Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('productos.edit');

    Route::put('/productos/{id}', [ProductController::class, 'update'])->name('productos.update');

    Route::patch('/admin/productos/{id}/toggle-active', [ProductController::class, 'toggleActive'])->name('productos.toggleActive');

});

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');

    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');

    Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');

    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');

    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');

    Route::put('/admin/banners/{banner}/activate', [BannerController::class, 'activate'])->name('banners.activate');

});

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');

    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');

    Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');

    Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');

    Route::put('/admin/menus/{menu}/activate', [MenuController::class, 'activate'])->name('menus.activate');

});

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/carrouseles', [CarrouselController::class, 'index'])->name('carrouseles.index');

    Route::get('/carrouseles/create', [CarrouselController::class, 'create'])->name('carrouseles.create');

    Route::post('/carrouseles/store', [CarrouselController::class, 'store'])->name('carrouseles.store');

    Route::get('/carrouseles/{id}/edit', [CarrouselController::class, 'edit'])->name('carrouseles.edit');

    Route::put('/carrouseles/{id}', [CarrouselController::class, 'update'])->name('carrouseles.update');

    Route::patch('/admin/carrousels/{id}/toggle', [CarrouselController::class, 'toggleActive'])->name('carrousels.toggle-active');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
