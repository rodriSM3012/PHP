<?php
require_once("../../config/db.php");
require_once("../../model/item.php");

$enemies = [];

try {
    $stmt = $db->query("SELECT * FROM enemies");
    $enemies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al leer en base de datos: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item = new Item($db);
    $item->setName($_POST['name'])
        ->setDescription($_POST['description'])
        ->setType($_POST['type'])
        ->setEffect($_POST['effect'])
        ->setImg($_POST['img']);


    if ($item->save()) {
        echo "Objeto guardado con exito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un objeto</title>
</head>

<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>
    <h1>Crea un objeto</h1>
    <form action=<?= $_SERVER['PHP_SELF'] ?> method='POST'>
        <label for="nameInput">Nombre:</label>
        <input type="text" name="name" id="nameInput"><br>

        <label for="descriptionInput">Descripción:</label>
        <textarea name="description" id="descriptionInput" placeholder="Inserta aquí una descripción"></textarea><br>

        <label for="typeInput">Tipo de objeto:</label>
        <input type="text" name="type" id="typeInput"><br>

        <label for="effectInput">Efecto del objeto:</label>
        <input type="text" name="effect" id="effectInput"><br>

        <button type="submit">Crear objeto</button>
    </form>
</body>

</html>