<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RarezaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DominioController;
use App\Http\Controllers\BiomaController;
use App\Http\Controllers\CriaturaController;
use App\Http\Controllers\EstructuraController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\MesaTrabajoController;
use App\Http\Controllers\UbicacionItemsController;
use App\Http\Controllers\HistorialBusquedaController;
use App\Http\Controllers\FavoritosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Superadmin y admin pueden crear, editar y eliminar
    Route::middleware(['role:superadmin|admin'])->group(function () {
        Route::resource('categorias', CategoriaController::class)->except(['index', 'show']);
        Route::resource('rareza', RarezaController::class)->except(['index', 'show']);
        Route::resource('items', ItemController::class)->except(['index', 'show']);
        Route::resource('inventario', InventarioController::class)->except(['index', 'show']);
        Route::resource('recetas', RecetaController::class)->except(['index', 'show']);
        Route::resource('bioma', BiomaController::class)->except(['index', 'show']);
        Route::resource('criatura', CriaturaController::class)->except(['index', 'show']);
        Route::resource('estructura', EstructuraController::class)->except(['index', 'show']);
        Route::resource('imagen', ImagenController::class)->except(['index', 'show']);
        Route::resource('mesa_trabajo', MesaTrabajoController::class)->except(['index', 'show']);
        Route::resource('ubicacion_items', UbicacionItemsController::class)->except(['index', 'show']);
        Route::resource('historial_busqueda', HistorialBusquedaController::class)->except(['index', 'show']);
        Route::resource('favoritos', FavoritosController::class)->except(['index', 'show']);
    });

    // Todos los logueados pueden ver
    Route::resource('categorias', CategoriaController::class)->only(['index', 'show']);
    Route::resource('rareza', RarezaController::class)->only(['index', 'show']);
    Route::resource('items', ItemController::class)->only(['index', 'show']);
    Route::resource('inventario', InventarioController::class)->only(['index', 'show']);
    Route::resource('recetas', RecetaController::class)->only(['index', 'show']);
    Route::resource('bioma', BiomaController::class)->only(['index', 'show']);
    Route::resource('criatura', CriaturaController::class)->only(['index', 'show']);
    Route::resource('estructura', EstructuraController::class)->only(['index', 'show']);
    Route::resource('imagen', ImagenController::class)->only(['index', 'show']);
    Route::resource('mesa_trabajo', MesaTrabajoController::class)->only(['index', 'show']);
    Route::resource('ubicacion_items', UbicacionItemsController::class)->only(['index', 'show']);
    Route::resource('historial_busqueda', HistorialBusquedaController::class)->only(['index', 'show']);
    Route::resource('favoritos', FavoritosController::class)->only(['index', 'show']);

    // Solo superadmin
    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('usuarios', UsuarioController::class)->only(['index', 'edit', 'update']);
        Route::resource('dominios', DominioController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    });

});

require __DIR__.'/auth.php';