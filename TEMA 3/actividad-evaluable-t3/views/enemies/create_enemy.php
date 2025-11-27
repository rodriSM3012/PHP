<?php
require_once("../../config/db.php");
require_once("../../model/Enemy.php");

$enemies = [];

try {
    $stmt = $db->query("SELECT * FROM enemies");
    $enemies = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al leer en base de datos: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enemy = new Enemy($db);
    $enemy->setName($_POST['name'])
        ->setDescription($_POST['description'])
        ->setHealth($_POST['health'])
        ->setStrength($_POST['strength'])
        ->setDefense($_POST['defense']);

    if ($enemy->save()) {
        echo "Enemigo guardado con exito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un enemigo</title>
</head>

<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>
    <h1>Crea un enemigo</h1>
    <form action=<?= $_SERVER['PHP_SELF'] ?> method='POST'>
        <label for="nameInput">Nombre:</label>
        <input type="text" name="name" id="nameInput"><br>

        <label for="descriptionInput">Descripción:</label>
        <textarea name="description" id="descriptionInput" placeholder="Inserta aquí una descripción"></textarea><br>

        <fieldset>
            <legend>Jefe:</legend>
            <input type="radio" name="isBoss" id="isBossTrue" value="true" />
            <label for="isBossTrue">Sí</label>
            <input type="radio" name="isBoss" id="isBossFalse" value="false" checked />
            <label for="isBossFalse">No</label>
        </fieldset><br>

        <label for="healthInput">Vida:</label>
        <input type="number" name="health" id="healthInput" value="100"><br>

        <label for="strengthInput">Fuerza:</label>
        <input type="number" name="strength" id="strengthInput" value="10"><br>

        <label for="defenseInput">Defensa:</label>
        <input type="number" name="defense" id="defenseInput" value="10"><br>

        <button type="submit">Crear personaje</button>
    </form>
</body>

</html>