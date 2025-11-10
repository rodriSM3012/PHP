<?php
session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    $user = "";
}

if (isset($_SESSION["rol"])) {
    $rol = $_SESSION["rol"];
} else {
    $rol = "";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido/a!</title>
</head>

<body>
    <h1>¡Bienvenido/a!</h1>
    <?php
    if ($user != "") {
    ?>
        <p>Un placer tenerte aquí de nuevo, <?php echo $user ?>.</p>
        <?php
        if ($rol == "admin") {
        ?>
            <p>Puedes acceder a la zona de administración desde <a href="./administracion.php">aquí</a>.</p>
        <?php
        }
        if ($rol != "") {
        ?>
            <p>Puedes acceder a nuestro contenido desde <a href="./contenido.php">aquí</a>.</p>
            <p>Puedes cerrar sesión desde <a href="./logout.php">aquí</a>.</p>
        <?php
        }
    } else {
        ?>
        <p>Si ya es socio/a, introduzca su usuario y contraseña <a href="./login.php">aquí</a>.</p>
    <?php
    }
    ?>


</body>

</html>