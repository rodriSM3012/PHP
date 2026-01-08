@extends('layouts.app')

@section('titulo', 'Listado de cursos')

@section('contenido')
    <h1>Cursos</h1>

    @foreach($cursos as $curso)
        <p>
            <a href="{{ route('curso.show', $curso->id) }}">
                {{ $curso->nombre }}
            </a>
        </p>
    @endforeach
@endsection