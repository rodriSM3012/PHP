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
    <table border="1" cellpadding="10" cellspacing="10">
        <tbody>
            <?php foreach ($menu as $categoria => $platos) { ?>
                <tr>
                    <th colspan="3"><?php echo $categoria ?></th>
                </tr>
                <tr>
                    <?php foreach ($platos as $plato) { ?>
                        <td><?php echo $plato["nombre"] ?></td>
                        <?php if ($plato["disponibilidad"]) { ?>
                            <td><?php echo $plato["precio"]; ?></td>
                        <?php } else { ?>
                            <td><?php echo "No disponible";
                            } ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
    <?php
    $altura = 15;
    $k = 1;
    for ($i = 0; $i <= $altura; $i++) {
        for ($j = ($altura - $i) - 1; $j >= 0; $j--) echo "&nbsp;";
        for ($k += ($i * 2) - 1; $k > 0; $k--) echo "*";
        echo "<br/>";
    }
    ?>
    <!-- 
    <?php
    $altura = 15;
    // dibujar piramide de 5 pisos 
    for ($i = $altura; $i > 0; $i--) { ?>
        <p>
        <?php
        for ($k = 0; $k <= ($i / 2 - 1); $k++) echo "-";
        for ($j = 0; $j < $altura - $i; $j++) echo "*";
        echo "<br/>";
    } ?></p> 
    -->

    <?php
    $altura = 15;
    for ($i = 1; $i <= $altura; $i++) {
        $numAsteriscos = $i * 2 - 1;
        $espacios = $altura - $i;
        $linea = "";

        for ($j = 0; $j < $espacios; $j++) $linea .= "&nbsp;";
        for ($k = 0; $k < $numAsteriscos; $k++) $linea .= "*";
    ?>
        <p><?php echo $linea ?></p>
    <?php
    }
    ?>

</body>

</html>