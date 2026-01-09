<h1>Listado de alumnos y sus cursos</h1>

@foreach($alumnos as $alumno)
    <h2>{{ $alumno->nombre }}</h2>

    <ul>
        @foreach($alumno->cursos as $curso)
            <li>{{ $curso->nombre }}</li>
        @endforeach
    </ul>
@endforeach