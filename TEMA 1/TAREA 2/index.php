<?php
$menu = [
    "Primeros platos" => [
        "Ensalada césar",
        "Sopa de tomate",
        "Bruschetta"
    ],
    "Segundos platos" => [
        "Pollo al curry",
        "Pasta al pesto",
        "Salmón a la plancha"
    ],
    "Postres" => "Chocolate"
]
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES - Tema 2 - Tarea 02</title>
</head>

<body>
    <h1>DWES - Tema 2 - Tarea 02</h1>
    <!-- h3 seccion primeros platos 
    parrafos primeros plats -->
    <section class="primeros-platos">
        <?php
        foreach ($menu as $categoria => $platos) { ?>
            <h3><?php echo $categoria ?></h3>
            <?php
            if (gettype($platos) == "array") {
                foreach ($platos as $plato) { ?>
                    <p><?php echo $plato ?></p>
                <?php
                }
            } else { ?>
                <p><?php echo $platos ?></p>
            <?php
            } ?>
        <?php
        } ?>

    </section>
</body>

</html>