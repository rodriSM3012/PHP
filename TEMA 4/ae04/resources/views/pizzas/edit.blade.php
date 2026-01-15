<input type="number" step="0.01" name="precio" value="{{ $pizza->precio }}">

<h3>Ingredientes</h3>
@foreach ($ingredientes as $ingrediente)
    <label>
        <input type="checkbox" name="ingredeintes[]"
            value="{{ $ingredientes->contains($ingrediente->id) ? 'checked' : '' }}">
    </label><br>
@endforeach

<button type="submit">Actualizar</button>
