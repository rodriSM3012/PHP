<?php
require_once("../../config/db.php");
require_once("../../model/Pizza.php");

$pizzas = [];
try {
    $pizzas = Pizza::getAll($db);
} catch (PDOException $ex) {
    echo "Error al leer en la base de datos: " . $ex->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pizza = new Pizza($db);
    $pizza->setNombre($_POST['nombre'])
          ->setDescripcion($_POST['descripcion'])
          ->setPrecio(isset($_POST['precio']) ? 1 : 0)
          ->setImagen($_POST['imagen']);
    if ($pizza->save()) {
        echo "pizza guardado con éxito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear pizza</title>
</head>
<body>
    <h1>Menú:</h1>
    <?php include('../partials/_menu.php') ?>

    <h1>Crea tu pizza</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.1"><br>

        <label for="imagen">Imagen:</label>
        <input type="text" name="imagen" id="imagen" required><br>

        <input type="submit" name="submit" id="submit" value="Crear pizza">
    </form>
</body>
</html>
