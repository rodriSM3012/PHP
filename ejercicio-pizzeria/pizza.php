<?php
if (isset($_GET["id"])) { // en los formularios es post pero aqui es get porque lo pasa por la url
    $id = $_GET["id"];
}

require_once "./bbdd.php";

$message = "";

try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);

    $query = "SELECT nombre, descripcion, precio, imagen FROM pizzas WHERE id=:id"; // en consulta preparadas se pasan con :
    $consulta = $conecta->prepare($query);
    $consulta->bindParam(":id", $id);
    $consulta->execute(); // $consulta es un array con nombre precio imagen

    foreach ($consulta as $pizza) { // si fuese >1 pizza se sobreescribirian los datos
        $nombre = htmlspecialchars($pizza["nombre"]);
        $descripcion = htmlspecialchars($pizza["descripcion"]);
        $precio = htmlspecialchars($pizza["precio"]);
        $imagen = htmlspecialchars($pizza["imagen"]);
    }
    // $pizzas = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error conectando a la base de datos: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria La Mía Masa! - Pizza</title>
    <style>
        img {
            width: 150px;
        }
    </style>
</head>

<body>
    <?php require_once "./menu.php";
    if ($message == "") { ?>
        <!-- imagen -->
        <img src="./assets/images/pizzas/<?= $imagen ?>" alt="<?= $nombre ?>">
        <!-- nombre -->
        <h1><?= $nombre ?></h1>
        <!-- descripcion -->
        <p><?= $descripcion ?></p>
        <!-- precio -->
        <p><?= $precio ?>€</p>
    <?php } ?>
</body>

</html>