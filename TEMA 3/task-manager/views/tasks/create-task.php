<?php
require_once("../../config/db.php");
require_once("../../model/Task.php");

$tasks = [];

try {
    $stmt = $db->query("SELECT * FROM tasks");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al leer en base de datos: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = new Task($db);
    $task->setName($_POST['name'])
        ->setDescription($_POST['description'])
        ->setStatus($_POST['status']);

    if ($task->save()) {
        echo "Tarea guardada con exito";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea una tarea</title>
</head>

<body>
    <h1>Menu: </h1>
    <?php include('../partials/_menu.php') ?>
    <h1>Crea una tarea</h1>
    <form action=<?= $_SERVER['PHP_SELF'] ?> method='POST'>
        <label for="nameInput">Nombre:</label>
        <input type="text" name="name" id="nameInput"><br>

        <label for="descriptionInput">Descripción:</label>
        <textarea name="description" id="descriptionInput" placeholder="Inserta aquí una descripción"></textarea><br>

        <fieldset>
            <legend>Estado:</legend>
            <input type="radio" name="status" id="statusComplete" value="1" />
            <label for="statusComplete">Completada</label>
            <input type="radio" name="status" id="statusUnfinished" value="0" checked />
            <label for="statusUnfinished">Por hacer</label>
        </fieldset><br>

        <button type="submit">Crear tarea</button>
    </form>
</body>

</html>