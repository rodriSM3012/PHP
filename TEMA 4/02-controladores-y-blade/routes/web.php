<?php

use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;

// php artisan make:controller PaginasController
Route::get('/', [CursosController::class, 'index'])->name("cursos");
