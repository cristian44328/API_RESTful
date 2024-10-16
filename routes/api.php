<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\AlmacenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

Route::resource('productos', ProductoController::class);

Route::resource('proveedores', ProveedorController::class);

Route::resource('almacenes', AlmacenController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

