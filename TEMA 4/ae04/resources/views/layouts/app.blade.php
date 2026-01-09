<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Aplicación Laravel')</title>
</head>
<body>
    {{-- Menú de navegación --}}
    @include('partials.menu')

    {{-- Contenido de cada vista --}}
    <main>
        @yield('contenido')
    </main>
</body>
</html>

