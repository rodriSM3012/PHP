<?php
require_once("./db.php");

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $query = 'SELECT * FROM tasks WHERE id = :id';
    $consulta = $db->prepare($query);
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    $task = $consulta->fetch(PDO::FETCH_ASSOC);
    $checked = $task["state"] ? "checked" : "";
    $msg = "Modificando {$task["task"]}";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["state"])) {
        $state = $_POST["state"];
    } else {
        $state = 0;
    }
    $query = 'UPDATE tasks SET task = :task, state = :state WHERE id = :id';
    $consulta = $db->prepare($query);
    $consulta->bindParam(":id", $id);
    $consulta->bindParam(":task", $_POST["task"]);
    $consulta->bindParam(":state", $state);


    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
            $msg =  "Actualización realizada correctamente.";
            $query = 'SELECT * FROM tasks WHERE id = :id';
            $consulta = $db->prepare($query);
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            $task = $consulta->fetch(PDO::FETCH_ASSOC);
            $checked = $task["state"] ? "checked" : "";
        } else {
            $msg =  "La actualización no afectó a ninguna fila.";
        }
    } else {
        $msg =  "Error al ejecutar la actualización.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> TO DO</h1>
    <?php require_once("./_menu.php") ?>
    <h2>Modificar tarea</h2>
    <p><?= $msg; ?></p>
        <form action="" method="post">
            <label for="task">Tarea:
                <input type="text" name="task" id="task" value="<?= $task["task"] ?>">
            </label>
            <br>
            <label for="task">Estado:
                <input type="checkbox" name="state" id="state" value="1" <?= $checked ?>>
            </label>
            <br>
            <input type="submit" name="submit" id="submit" value="Enviar">
        </form>

</body>

</html>