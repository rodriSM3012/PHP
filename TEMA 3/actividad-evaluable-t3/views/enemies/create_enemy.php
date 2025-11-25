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
    $enemy->setName($_POST['name']);
    $enemy->setDescription($_POST['description']);
    $enemy->setHealth($_POST['health']);
    $enemy->setStrength($_POST['strength']);
    $enemy->setDefense($_POST['defense']);

    if ($enemy->save()) {
        echo "Personaje guardado con exito";
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
        <input type="text" name="name" id="nameInput">

        <label for="descriptionInput">Descripción:</label>
        <input type="text" name="description" id="descriptionInput">

        <label for="isBossInput">Jefe:</label>
        <!-- TODO comprobar que funciona los botones radio -->
        <input type="radio" name="isBossTrue" id="isBossInputTrue">Sí
        <input type="radio" name="isBossNo" id="isBossInputFalse">No

        <label for="healthInput">Vida:</label>
        <input type="number" name="health" id="healthInput" value="100">

        <label for="strengthInput">Fuerza:</label>
        <input type="nummber" name="strength" id="strengthInput" value="10">

        <label for="defenseInput">Defensa:</label>
        <input type="number" name="defense" id="defenseInput" value="10">

        <button type="submit">Crear personaje</button>
    </form>

    <h1>Personajes creados: </h1>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Salud</th>
                <th>Fuerza</th>
                <th>Defensa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($characters as $character): ?>
                <tr>
                    <td>img</td>
                    <td><?= $character['name'] ?></td>
                    <td><?= $character['description'] ?></td>
                    <td><?= $character['health'] ?></td>
                    <td><?= $character['strength'] ?></td>
                    <td><?= $character['defense'] ?></td>
                    <td>
                        <form action="edit_character.php" method="GET">
                            <input type="hidden" name="id" value="<?= $character['id'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="delete_character.php" method="POST">
                            <input type="hidden" name="id" value="<?= $character['id'] ?>">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>