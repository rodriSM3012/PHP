<?php
$menu = [
    "Primeros platos" => [
        [
            "nombre" => "Ensalada césar",
            "precio" => 5.50,
            "disponibilidad" => true
        ],
        [
            "nombre" => "Sopa de tomate",
            "precio" => 4.0,
            "disponibilidad" => true
        ],
        [
            "nombre" => "Bruschetta",
            "precio" => 6.50,
            "disponibilidad" => false
        ]
    ],
    "Segundos platos" => [
        [
            "nombre" => "Pollo al curry",
            "precio" => 3.0,
            "disponibilidad" => false
        ],
        [
            "nombre" => "Pasta al pesto",
            "precio" => 4.50,
            "disponibilidad" => true
        ],
        [
            "nombre" => "Salmón a la plancha",
            "precio" => 7.50,
            "disponibilidad" => true
        ]
    ],
    "Postres" => [
        [
            "nombre" => "Chocolate",
            "precio" => 2.50,
            "disponibilidad" => true
        ],
        [
            "nombre" => "Yogur",
            "precio" => 1.50,
            "disponibilidad" => false
        ],
        [
            "nombre" => "Manzana",
            "precio" => 1.0,
            "disponibilidad" => true
        ]
    ]
]
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <!-- array asociativo pero por cada plato tiene que poner nombre precio y sis esta disponible -->
    <h1>Menú</h1>
    <table>
        <thead>
            <?php
            foreach ($menu as $categoria => $platos) {
            ?>
                <tr>
                    <th>
                        <h3><?php echo $categoria; ?></h3>
                    </th>
                </tr>
            <?php } ?>
        </thead>
        <tbody>
            <?php
            if (gettype($platos) == "array") {
                foreach ($platos as $plato) {
                    foreach ($plato as $clave => $valor) { ?>
                        <tr>
                            <td><?php echo $valor ?></td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>