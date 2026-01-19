@extends('layouts.app')

<table>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <tr>
        <th>Ingrediente</th>
        <th colspan="2">Acciones</th>
    </tr>
    @foreach ($ingredientes as $ingrediente)
        <tr>
            <td><a href="{{ route('ingredientes.showOneIngrediente', $ingrediente->id) }}">{{ $ingrediente->nombre }}</a></td>
            <td><a href="{{ route('ingredientes.edit', $ingrediente->id) }}">Editar</a></td>
            <td><a href="{{ route('ingredientes.confirmDelete', $ingrediente->id) }}">Eliminar</a></td>
        </tr>
    @endforeach
</table>
