<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location:08-sesiones-login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>DWES Tema 3</title>
</head>

<body>
    <h1>¡Bienvenido, <?php echo $_SESSION["usuario"] ?>!</h1>
    <p><a href="./08-sesiones-logout.php">Cerrar sesión</a></p>
</body>

</html>