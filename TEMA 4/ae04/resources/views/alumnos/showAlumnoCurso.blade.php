<h1>Listado de un alumno y sus cursos</h1>

    <h2>{{ $alumno->nombre }}</h2>

    <ul>
        @foreach($alumno->cursos as $curso)
            <li>{{ $curso->nombre }}</li>
        @endforeach
    </ul>