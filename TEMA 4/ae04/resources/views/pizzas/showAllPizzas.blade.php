<table>
    <tr>
        <th>Pizza</th>
        <th>Precio</th>
    </tr>
    @foreach ($pizzas as $pizza)
        <tr>
            <td>{{ $pizza . nombre }}</td>
            <td></td>
        </tr>
    @endforeach
</table>
