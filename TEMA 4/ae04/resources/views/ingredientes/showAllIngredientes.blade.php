@extends('layout.app')

<table>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <tr>
        <th>Ingrediente</th>
        <th colspan="2">Acciones</th>
    </tr>
    @foreach ($pizzas as $pizza)
        <tr>
            <td><a href="{{ route('ingrediente.showOneIngrediente') }}">{{ $pizza->nombre }}</a></td>
            <td><a href="{{ route('ingrediente.edit', $pizza->id) }}">Editar</a></td>
            <td><a href="{{ route('ingrediente.confirmDelete', $pizza) }}">Eliminar</a></td>
        </tr>
    @endforeach
</table>
