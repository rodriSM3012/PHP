<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludando</title>
</head>

<body>
    <h1>Saludando a: {{$nombre}}</h1>
     <!-- ahora, un if -->
    @if($nombre == 'Juan')
    <p>Eres el profesor</p>
    @else
    <p>Eres un alumno</p>
    @endif
</body>

</html>