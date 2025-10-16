<?php

$menu = [
    "Primeros platos" => [
        ["nombre" => "Ensalada César", "precio" => 5.50, "disponibilidad" => true],
        ["nombre" => "Sopa de tomate", "precio" => 6.50, "disponibilidad" => false],
        ["nombre" => "Bruschetta", "precio" => 7.50, "disponibilidad" => true]
    ],
    "Segundos platos" => [
        ["nombre" => "Solomillo", "precio" => 15.50, "disponibilidad" => true],
        ["nombre" => "Merluza", "precio" => 13.50, "disponibilidad" => false],
        ["nombre" => "Pizza", "precio" => 8.50, "disponibilidad" => true]
    ],
    "Postres" => [
        ["nombre" => "Cholocate", "precio" => 5.0, "disponibilidad" => true],
        ["nombre" => "Fruta", "precio" => 4.0, "disponibilidad" => false],
        ["nombre" => "Flan", "precio" => 3.0, "disponibilidad" => true]
    ]
];
$menuBackup = $menu;

$pedido = [
    "Chocolate",
    "Merluza",
    "Langosta"
];
$pedidoBackup = $pedido;

function comprobarPlato($platoCom, $menu)
{
    foreach ($menu as $categoria) {
        foreach ($categoria as $plato) {
            if ($plato == $platoCom) return true;
        }
    }
    return false;
}

function generarComanda($menu, $pedido)
{
    $comanda = [];
    foreach ($menu as $categoria => $platos) {
        foreach ($platos as $plato) {
            if (in_array($plato["nombre"], $pedido) && $plato["disponibilidad"]) { // recorre cada elemento del array
                $comanda[$plato["nombre"]] = $plato["precio"]; // añade nombre del plato y el valor del precio
            } else if (in_array($plato["nombre"], $pedido) && !$plato["disponibilidad"]) {
                $comanda[$plato["nombre"]] = "No disponible";
            }
        }
    }
    foreach ($pedido as $platoPedido) {
        if (!in_array($platoPedido, array_keys($comanda))) {
            // array_keys 
            $comanda[$platoPedido] = "No está en el menú";
        }
    }
    return $comanda;
}

$comanda = generarComanda($menu, $pedido);
var_dump($comanda);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- tabla comanda poner nombre y precio
    si el plato no esta disponible hay que poner en precio "no disponible"
    si no existe tiene que poner "no esta en carta" 
    poner total del percio debajo 
    hacer array asociativo $comanda entre $menu y $ pedido -->

    <table border="1" cellpadding="10" cellspacing="10">
        <?php
        foreach ($comanda as $plato => $precio) { ?>
            <tr>
                <th><?php echo $plato ?></th>
                <th><?php echo $precio ?></th>
            </tr>
        <?php
        } ?>
    </table>
</body>

</html>