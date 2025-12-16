<?php

// es como un import de java
use Illuminate\Support\Facades\Route;

Route::get('/saludoescrito', function () {
    return "Esto es un saludo escrito directamente en la ruta";
});

Route::get('/saludoescritohtml', function () {
    return "
    <h1>Esto es un saludo</h1>
    <p>escrito directamente en la ruta</p>";
});

Route::get('/saludopersonalizado/{nombre}', function ($nombre) {
    return "<h1>Esto es un saludo para $nombre</h1>";
});

Route::get('/saludopersonalizado2/{nombre?}', function ($nombre = null) {
    if ($nombre) {
        return "<h1>Esto es un saludo para $nombre</h1>";
    } else {
        return "<h1>Esto es un saludo para desconocido</h1>";
    }
});

Route::get('/saludopersonalizado3/{nombre?}/{edad?}', function ($nombre = null, $edad = null) {
    if ($nombre && $edad) {
        return "<h1>$nombre tiene $edad años</h1>";
    } else if ($nombre && !$edad) {
        return "<h1>$nombre no tiene edad</h1>";
    } else if (!$nombre && $edad) {
        return "<h1>Desconocido tiene $edad años</h1>";
    }
    return "<h1>Desconocido</h1>";
    // si hay edad no puede faltar nombre
});

// llama a un metodo estatico
Route::get('/', function () {
    return view('welcome');
});
