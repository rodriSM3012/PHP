<?php
require_once("../../config/db.php");
require_once("../../model/Task.php");

$taskId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($taskId <= 0) {
    echo "ID de tarea inválida.";
    exit;
}

$task = new Task($db);
if (!$task->loadById($taskId)) {
    echo "Tarea no encontrada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $task->setName(trim($_POST['name']))
        ->setDescription(trim($_POST['description']))
        ->setStatus(trim($_POST['status']));
    if ($task->save()) {
        header("Location: list_task.php");
        exit;
    } else {
        echo "Error al actualizar la tarea.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>

<body>
    <h1>Editar Tarea</h1>
    <form method="POST">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($task->getName()) ?>" required><br>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description"
            required><?= htmlspecialchars($task->getDescription()) ?></textarea><br>

        <fieldset>
            <legend>Estado:</legend>
            <input type="radio" name="status" id="statusComplete" value="1" <?= ($task->getStatus() == 1) ? "checked" : "" ?> />
            <label for="statusComplete">Completada</label>
            <input type="radio" name="status" id="statusUnfinished" value="0" <?= ($task->getStatus() == 0) ? "checked" : "" ?> />
            <label for="statusUnfinished">Por hacer</label>
        </fieldset><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>

</html>