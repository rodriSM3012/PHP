@extends('layouts.app')

<h1>{{ $pizza->nombre }}</h1>
<h2>{{ $pizza->precio }}</h2>
<p>{{ $pizza->descripcion }}</p>
<h3>Ingredientes</h3>
<ul>
    @foreach ($pizza->ingredientes as $ingrediente)
        <li>{{ $ingrediente->nombre }}</li>
    @endforeach
</ul>
