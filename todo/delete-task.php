<?php
require_once("./db.php");

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $query = 'SELECT * FROM tasks WHERE id = :id';
    $consulta = $db->prepare($query);
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    $task = $consulta->fetch(PDO::FETCH_ASSOC);
    $checked = $task["state"] ? "Hecho" : "Pendiente de hacer";
    $msg = "Eliminando {$task["task"]}";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["action"] == "Borrar") {
    $query = 'DELETE FROM tasks WHERE id = :id';
    $consulta = $db->prepare($query);
    $consulta->bindParam(":id", $id);
    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
            header("Location: index.php");
        } else {
        $msg =  "Error al ejecutar la eliminación.";
        }
    } else {
        $msg =  "Error al ejecutar la eliminación.";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["action"] == "No Borrar") {
            header("Location: index.php");
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
    <h2>Eliminar tarea</h2>
    <p><?= $msg; ?></p>
        <form action="" method="post">
            <input type="submit" name="action" id="delete" value="Borrar">
            <input type="submit" name="action" id="cancel" value="No Borrar">
        </form>

</body>

</html>