<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RarezaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\RecetaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por login
Route::middleware(['auth'])->group(function () {

    // Solo superadmin y admin pueden crear, editar y eliminar
    Route::middleware(['role:superadmin|admin'])->group(function () {
        Route::resource('categorias', CategoriaController::class)->except(['index', 'show']);
        Route::resource('rareza', RarezaController::class)->except(['index', 'show']);
        Route::resource('items', ItemController::class)->except(['index', 'show']);
        Route::resource('inventario', InventarioController::class)->except(['index', 'show']);
        Route::resource('recetas', RecetaController::class)->except(['index', 'show']);
    });

    // Todos los logueados pueden ver
    Route::resource('categorias', CategoriaController::class)->only(['index', 'show']);
    Route::resource('rareza', RarezaController::class)->only(['index', 'show']);
    Route::resource('items', ItemController::class)->only(['index', 'show']);
    Route::resource('inventario', InventarioController::class)->only(['index', 'show']);
    Route::resource('recetas', RecetaController::class)->only(['index', 'show']);
});

require __DIR__.'/auth.php';
