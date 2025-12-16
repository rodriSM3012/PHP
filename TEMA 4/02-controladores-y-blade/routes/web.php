<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;

// al poner '/' ya sabe que es POST para que no incluya datos en la URL
Route::get('/', function () {
    return view('miprimeravista');
});
