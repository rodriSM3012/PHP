<?php
require_once("../../config/db.php");
require_once("../../model/Task.php");

$taskModel = new Task($db);
$tasks = $taskModel->getAll();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
</head>

<body>
    <h1>Tareas creadas: </h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['name'] ?></td>
                    <td><?= $task['description'] ?></td>
                    <td><?= ($task['status'] == 1) ? "Completa" : "Sin hacer" ?></td>
                    <td>
                        <form action="edit_task.php" method="GET">
                            <input type="hidden" name="id" value="<?= $task['id'] ?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="delete_task.php" method="POST">
                            <input type="hidden" name="id" value="<?= $task['id'] ?>">
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>