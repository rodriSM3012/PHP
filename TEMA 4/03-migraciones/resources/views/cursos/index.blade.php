<ul>
    @foreach ($cursos as $curso)
        <li>{{ $curso->nombre }}</li>
    @endforeach
</ul>
