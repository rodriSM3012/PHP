<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>

<body>
    <?php

    $libros = [
        "libro1" => [
            "titulo" => "PHP para Principiantes",
            "autor" => "Carlos Ruiz",
            "precio" => 19.99,
            "categoria" => "Desarrollo web"
        ],
        "libro2" => [
            "titulo" => "JavaScript Avanzado",
            "autor" => "Laura García",
            "precio" => 25.99,
            "categoria" => "Desarrollo web"
        ],
        "libro3" => [
            "titulo" => "Algoritmos en Python",
            "autor" => "Miguel Fernández",
            "precio" => 29.99,
            "categoria" => "Algoritmos"
        ]
    ];

    #filtrar los libros de la categpria "Desarrollo web"
    $filtredLibros = array_filter($libros, function ($libro) {
        return $libro["categoria"] == "Desarrollo web";
    });

    #a los libros de Desarrollo web aplicadle un 15% de descuento
    $discountedLibros = array_map(function ($libro) {
        $libro["precio"] *= 0.85;
        return $libro;
    }, $filtredLibros);
    ?>

    <h2>Información de todos los libros</h2>
    <table border="1" cellspacing="10" cellpadding="10">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            <!-- mostrad en esta tabla todos los libros -->
            <?php foreach ($libros as $libro) ?>
            <tr>
                <td><?php echo $libro["titulo"] ?></td>
                <td><?php echo $libro["autor"] ?></td>
                <td><?php echo $libro["precio"] ?></td>
                <td><?php echo $libro["categoria"] ?></td>
            </tr>
        </tbody>
    </table>

    <h2>Libros de Categoría "Desarrollo Web"</h2>
    <ul>
        <!-- mostrad en esta lista todos los libros de Desarrollo web -->
        <?php foreach ($filtredLibros as $libro => $titulo) { ?>
            <li><?php echo $titulo ?></li>
        <?php } ?>
    </ul>

    <h2>Libros de Categoría "Desarrollo Web" con descuento</h2>
    <ul>
        <!-- mostrad en esta lista todos los libros de Desarrollo web con descuento aplicado -->
        <?php foreach ($discountedLibros as $libro => $titulo) { ?>
            <li><?php echo $titulo ?></li>
        <?php } ?>
    </ul>
</body>

</html>