<?php
require_once("./db.php");

$stmt = $db->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
</head>

<body>
    <h1> TO DO</h1>
    <?php require_once("./_menu.php") ?>
    <h2>Tareas</h2>
    <table border="1" cellpadding="10" cellspacing="10">
        <?php foreach ($tasks as $task) {
                $state = $task["state"] ? "Hecho" : "Pendiente"?>
            <tr>
                <td><?= $task["task"] ?></td>
                <td><?= $state ?></td>
                <td><a href="update-task.php?id=<?= $task["id"] ?>">Modificar</a><br><a href="delete-task.php?id=<?= $task["id"] ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>