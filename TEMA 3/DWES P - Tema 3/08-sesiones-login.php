<?php
$nombre = "";
$clave = "";

function comprobar_usuario($nombre, $clave)
{
    if ($nombre === "noadmin" and $clave === "1234") {
        $usuarios["nombre"] = "Usuario";
        $usuarios["rol"] = 0;
        return $usuarios;
    } elseif ($nombre === "admin" and $clave === "1234") {
        $usuarios["nombre"] = "Administrador";
        $usuarios["rol"] = 1;
        return $usuarios;
    } else {
        return [];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["usuario"];
    $clave = $_POST["clave"];
    $usuarios = comprobar_usuario($nombre, $clave);
    if ($usuarios == false) {
        $error = true;
    } else {
        session_start();
        $_SESSION["usuario"] = $usuarios["nombre"];
        $_SESSION["rol"] = $usuarios["rol"];
        echo $_SESSION["usuario"];
        echo $_SESSION["rol"];
        header("Location: 08-sesiones-principal.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>DWES Tema 3</title>
</head>

<body>
    <?php
    if (isset($error)) {
    ?>
        <p>Revise su usuario y contraseña.</p>
    <?php } else { ?>
        <p>Introduzca su usuario y contraseña.</p>
    <?php
    }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario
            <input type="text" value="<?php if ($nombre != "") echo $nombre; ?>" name="usuario" id="usuario">
        </label>
        <label for="clave">Clave
            <input type="password" name="clave" id="clave">
        </label>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>

</html>