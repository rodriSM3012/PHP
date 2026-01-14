<h1>Nueva Pizza</h1>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
            @endforeach
        </ul>
    </div>
    @csrf
    <form action="{{ route('pizzas.store') }}">

    </form>

    <h3>Ingredientes</h3>
    @foreach ($ingredientes as $ingrediente)
        <label>
            <input type="checkbox" name="ingredientes[]" value="{{ $ingredientes->id }}">
            {{ $ingredientes->nombre }}
        </label><br>
    @endforeach
@endif
