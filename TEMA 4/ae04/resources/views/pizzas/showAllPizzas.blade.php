<table>
    <tr>
        <th>Pizza</th>
        <th>Precio</th>
    </tr>
    @foreach ($pizzas as $pizza)
        <tr>
            <td><a href="{{ route('pizzas.showOnePizza') }}">{{ $pizza->nombre }}</a></td>
            <td>{{ $pizza->precio }}</td>
        </tr>
    @endforeach
</table>
