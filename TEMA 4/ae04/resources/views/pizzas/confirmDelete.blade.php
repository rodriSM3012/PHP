@extends('layout.app')

<h1>Eliminar Pizza</h1>
<p>¿Estas seguro de que deseas eliminar la pizza <strong>{{ $pizza->nombre }}</strong></p>

<form method="POST" action="{{ route('pizzas.destroy', $pizza) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Sí, eliminar</button>
    <a href="{{ route('pizzas.showAllPizzas') }}">Cancelar</a>
</form>
