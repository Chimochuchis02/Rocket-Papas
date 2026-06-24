<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminUser;
use App\Http\Controllers\CarrouselController;
use App\Http\Controllers\ProductController;


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
    return view('welcome');
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

    // 6. Acción de Eliminar de la BD (DELETE) -> productos.destroy
    Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');

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

    // 6. Acción de Eliminar de la BD (DELETE) -> carrouseles.destroy
    Route::delete('/carrouseles/{id}', [CarrouselController::class, 'destroy'])->name('carrouseles.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
