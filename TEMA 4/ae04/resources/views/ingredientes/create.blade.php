@extends('layout.app')

<h1>Nuevo Ingrediente</h1>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
            @endforeach
        </ul>
    </div>
    @csrf
    <form action="{{ route('ingredientes.store') }}">

    </form>
@endif
