<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AlumnosController;

Route::get('/', [CursosController::class, 'index'])->name('cursos.index');
Route::get('/curso/{id}', [CursosController::class, 'show'])->name('curso.show');

Route::get('/alumnos', [AlumnosController::class, 'showAlumnos'])->name('alumnos.show');
Route::get('/alumno/{id}', [AlumnosController::class, 'showAlumno'])->name('alumno.show');

Route::get('/alumnoscurso', [AlumnosController::class, 'showAlumnosCurso'])->name('alumnosCurso.show');
Route::get('/alumnocurso/{id}', [AlumnosController::class, 'showAlumnoCurso'])->name('alumnoCurso.show');
