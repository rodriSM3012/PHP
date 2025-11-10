<?php
session_start();

if(!isset($_SESSION["rol"])){
    header("Location: index.php");
} else if ($_SESSION["rol"]!="admin") {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona de administración</title>
</head>
<body>
    <h1>Bienvenido a la zona de administración.</h1>
    <p><a href="./index.php">Ir al inicio.</a></p>
</body>
</html>