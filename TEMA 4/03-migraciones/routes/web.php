<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;

Route::get('/', [CursosController::class, 'index'])->name('cursos.index');
Route::get('/curso/{id}', [CursosController::class, 'show'])->name('curso.show');

