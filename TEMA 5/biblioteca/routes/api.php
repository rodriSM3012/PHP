<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LectorController;
use App\Http\Controllers\LibroController;

Route::apiResource('lectores', LectorController::class);
Route::apiResource('libros', LibroController::class);

Route::post('prestamos/lector/{lector_id}/libro/{libro_id}', [LibroController::class, 'prestarLibro']);
Route::post('devoluciones/lector/{lector_id}/libro/{libro_id}', [LibroController::class, 'devolverLibro']);
