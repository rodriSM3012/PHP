<!DOCTYPE html>
<html lang="eS">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludando</title>
</head>

<body>
    <h1>Saludando a:</h1>
    <ul>
        @foreach($nombres as $nombre)
        <li>{{ $nombre }}</li>
        @endforeach
    </ul>
</body>

</html>