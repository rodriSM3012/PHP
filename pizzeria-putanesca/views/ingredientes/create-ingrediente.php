<?php
require_once "../../config/db.php";
require_once "../../model/Ingrediente.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingrediente = new Ingrediente($db);
    $ingrediente->setNombre($_POST["nombre"]);
    if ($ingrediente->save()) {
        echo "Ingrediente guardado con éxito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ingrediente</title>
</head>

<body>
    <h1>Menú:</h1>
    <?php include("../partials/menu.php") ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <input type="text">
    </form>
</body>

</html>