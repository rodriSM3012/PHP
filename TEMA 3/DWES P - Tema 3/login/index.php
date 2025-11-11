<?php
session_start();

// comprueba si existe la variable se sesion user y lo mete en otra variable y si no la pone en vacio 
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    $user = "";
}

// igual con rol 
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
        <!-- saluda -->
        <p>Un placer tenerte aquí de nuevo, <?php echo $user ?>.</p>
        <?php
        if ($rol == "admin") {
            // solo se muestra si es admin 
            ?>
            <p>Puedes acceder a la zona de administración desde <a href="./administracion.php">aquí</a>.</p>
            <?php
        }
        if ($rol != "") {
            // todos ven estos 2 parrafos 
            ?>
            <p>Puedes acceder a nuestro contenido desde <a href="./contenido.php">aquí</a>.</p>
            <p>Puedes cerrar sesión desde <a href="./logout.php">aquí</a>.</p>
            <?php
        }
    } else {
        // si user esta vacio es que no se ha identificado y pone enlace a pag de login 
        ?>
        <p>Si ya es socio/a, introduzca su usuario y contraseña <a href="./login.php">aquí</a>.</p>
        <?php
    }
    ?>


</body>

</html>