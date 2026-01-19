<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\IngredienteController;

Route::get('/', [PizzaController::class, 'showAllPizzas'])->name('pizzas.showAllPizzas');
Route::get('/pizza/{id}', [PizzaController::class, 'showOnePizza'])->name('pizzas.showOnePizza');

Route::post('/pizzas', [PizzasController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [PizzasController::class, 'create'])->name('pizzas.create');

Route::get('/pizzas/{id}/edit', [PizzasController::class, 'edit'])->name('pizzas.edit');
Route::put('/pizzas/{id}', [PizzasController::class, 'update'])->name('pizzas.update');

Route::get('/pizzas/{id}/delete', [PizzasController::class, 'delete'])->name('pizzas.delete');

Route::get('/ingredientes/{id}/delete', [IngredienteController::class, 'delete'])->name('ingredientes.delete');

Route::get('/ingredientes', [IngredienteController::class, '#TODO'])->name('ingredientes.#TODO');
