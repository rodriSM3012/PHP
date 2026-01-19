<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Aplicación Laravel')</title>
</head>

<body>
    <ul>
        <li><a href="{{ route('pizzas.showAllPizzas') }}"></a>Lista de pizzas</li>
        <li><a href="{{ route('pizzas.create') }}"></a>Crear pizza</li>
        <li><a href=""></a>Lista de ingredientes</li>
        <li><a href=""></a>Crear ingrediente</li>
    </ul>
</body>

</html>
