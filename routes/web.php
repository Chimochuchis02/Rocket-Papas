<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminUser;
use App\Http\Controllers\CarrouselController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use App\Models\Product;
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
    $productos = Product::with('dish', 'promotion')->latest()->get();
    $bannerActivo = Banner::where('is_Active', 1)->first();
    $menuActivo = Menu::where('is_Active', 1)->first();
    return view('welcome', compact('bannerActivo' , 'menuActivo' , 'productos'));
});

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(AdminUser::class)->name('dashboard');

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');

    // 2. Formulario de Creación -> productos.create
    Route::get('/productos/create', [ProductController::class, 'create'])->name('productos.create');

    // 3. Acción de Guardar en BD (El formulario POST) -> productos.store
    Route::post('/productos/store', [ProductController::class, 'store'])->name('productos.store');

    // 4. Formulario de Edición (Pide el ID) -> productos.edit
    Route::get('/productos/{id}/edit', [ProductController::class, 'edit'])->name('productos.edit');

    // 5. Acción de Actualizar en BD (PUT/PATCH) -> productos.update
    Route::put('/productos/{id}', [ProductController::class, 'update'])->name('productos.update');

    // 6. Acción de Activar/Desactivar de la BD (DELETE) -> productos.toggleActive
    Route::patch('/admin/productos/{id}/toggle-active', [ProductController::class, 'toggleActive'])->name('productos.toggleActive');

});

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');

    // 2. Formulario de Creación -> banners.create
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banners.create');

    // 3. Acción de Guardar en BD (El formulario POST) -> banners.store
    Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');

    // 4. Formulario de Edición (Pide el ID) -> banners.edit
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');

    // 5. Acción de Actualizar en BD (PUT/PATCH) -> bannners.update
    Route::put('/banners/{id}', [BannerController::class, 'update'])->name('banners.update');

    // 6. Acción de Activar/Desactivar de la BD (DELETE) -> banners.toggleActive
    Route::put('/admin/banners/{banner}/activate', [BannerController::class, 'activate'])->name('banners.activate');

});

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');

    // 2. Formulario de Creación -> menus.create
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');

    // 3. Acción de Guardar en BD (El formulario POST) -> menus.store
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');

    // 4. Formulario de Edición (Pide el ID) -> menus.edit
    Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');

    // 5. Acción de Actualizar en BD (PUT/PATCH) -> menus.update
    Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');

    // 6. Accion de cambiar los menus en la base de datos(PATCH) -> menus.activate
    Route::put('/admin/menus/{menu}/activate', [MenuController::class, 'activate'])->name('menus.activate');

});

Route::middleware(['auth'])->prefix('admin/dashboard')->group(function () {

    Route::get('/carrouseles', [CarrouselController::class, 'index'])->name('carrouseles.index');

    // 2. Formulario de Creación -> carrouseles.create
    Route::get('/carrouseles/create', [CarrouselController::class, 'create'])->name('carrouseles.create');

    // 3. Acción de Guardar en BD (El formulario POST) -> carrouseles.store
    Route::post('/carrouseles/store', [CarrouselController::class, 'store'])->name('carrouseles.store');

    // 4. Formulario de Edición (Pide el ID) -> carrouseles.edit
    Route::get('/carrouseles/{id}/edit', [CarrouselController::class, 'edit'])->name('carrouseles.edit');

    // 5. Acción de Actualizar en BD (PUT/PATCH) -> carrouseles.update
    Route::put('/carrouseles/{id}', [CarrouselController::class, 'update'])->name('carrouseles.update');

    // 6. Acción de Desactivar de la BD (PATCH) -> carrouseles.desactivate
    Route::patch('/admin/carrousels/{id}/toggle', [CarrouselController::class, 'toggleActive'])->name('carrousels.toggle-active');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
