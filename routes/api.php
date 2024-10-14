<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios', [UsuarioController::class, 'update']);
Route::delete('/usuarios', [UsuarioController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
