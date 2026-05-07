<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Todos los posts</h1>

    <?php
    foreach ($posts as $post) {
        echo "<h2>{$post->title}</h2>";
    }
    ?>
</body>

</html>
