<table>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <tr>
        <th>Pizza</th>
        <th>Precio</th>
        <th colspan="2">Acciones</th>
    </tr>
    @foreach ($pizzas as $pizza)
        <tr>
            <td><a href="{{ route('pizzas.showOnePizza') }}">{{ $pizza->nombre }}</a></td>
            <td>{{ $pizza->precio }}</td>
            <td><a href="{{ route('pizzas.edit', $pizza->id) }}">Editar</a></td>
            <td><a href="{{ route('pizzas.confirmDelete', $pizza) }}">Eliminar</a></td>
        </tr>
    @endforeach
</table>
