<?php
require_once("./db.php");
$msg = "Añadiendo una tarea";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["state"])) {
        $state = $_POST["state"];
    } else {
        $state = 0;
    }
    $query = 'INSERT INTO tasks (task, state) VALUES (:task, :state)';
    $consulta = $db->prepare($query);
    $consulta->bindParam(":task", $_POST["task"]);
    $consulta->bindParam(":state", $state);

    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
            $msg =  "Inserción realizada correctamente.";
        } else {
            $msg =  "La inserción no afectó ninguna fila.";
        }
    } else {
        $msg =  "Error al ejecutar la insercción.";
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
    <h2>Crear tarea</h2>
    <p><?= $msg; ?></p>
    <form action="" method="post">
        <label for="task">Tarea:
            <input type="text" name="task" id="task">
        </label>
        <br>
        <label for="task">Estado:
            <input type="checkbox" name="state" id="state" value="1">
        </label>
        <br>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>

</body>

</html>