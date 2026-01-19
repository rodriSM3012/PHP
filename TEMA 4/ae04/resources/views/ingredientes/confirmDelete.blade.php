@extends('layout.app')

<h1>Eliminar Ingrediente</h1>
<p>¿Estas seguro de que deseas eliminar el ingrediente? <strong>{{ $ingrediente->nombre }}</strong></p>

<form method="POST" action="{{ route('ingredientes.destroy', $pizza) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Sí, eliminar</button>
    <a href="{{ route('ingredientes.showAllIngredientes') }}">Cancelar</a>
</form>
