<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredienteController;

// pizza
Route::get('/', [PizzaController::class, 'showAllPizzas'])->name('pizzas.showAllPizzas');
Route::get('/pizza/{id}', [PizzaController::class, 'showOnePizza'])->name('pizzas.showOnePizza');

Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');

Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
Route::put('/pizzas/{id}', [PizzaController::class, 'update'])->name('pizzas.update');

Route::get('/pizzas/{id}/delete', [PizzaController::class, 'delete'])->name('pizzas.confirmDelete');

// ingredientes
Route::get('/ingredientes', [IngredienteController::class, 'showAllIngredientes'])->name('ingredientes.showAllIngredientes');
Route::get('/ingredientes/{id}', action: [IngredienteController::class, 'showOneIngrediente'])->name('ingredientes.showOneIngrediente');

Route::post('/ingredientes', [IngredienteController::class, 'store'])->name('ingredientes.store');
Route::get('/ingredientes/create', [IngredienteController::class, 'create'])->name('ingredientes.create');

Route::get('/ingredientes/{id}/edit', [IngredienteController::class, 'edit'])->name('ingredientes.edit');
Route::put('/ingredientes/{id}', [IngredienteController::class, 'update'])->name('ingredientes.update');

Route::get('/ingredientes/{id}/delete', [IngredienteController::class, 'delete'])->name('ingredientes.confirmDelete');
