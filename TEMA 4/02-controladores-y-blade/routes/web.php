<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;

// php artisan make:controller PaginasController
Route::get('/', [PaginasController::class, 'inicio']);
Route::get('/saludo', [PaginasController::class, 'saludo']);
Route::get('/muchossaludos', [PaginasController::class, 'muchosSaludos']);
Route::get('/plantilla01', [PaginasController::class, 'plantilla01']);
Route::get('/plantilla02', [PaginasController::class, 'plantilla02']);
Route::get('/saludopersonalizado/{nombre}', [PaginasController::class, 'saludopersonalizado']);
Route::get('/saludopersonalizado', [PaginasController::class, 'saludopersonalizadosinparametro']);
