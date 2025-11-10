<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    if ($usuario == "Paco" and $clave == "1234") {
        header("Location:bienvenido.html");
    } else {
        $error = true;
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
    <?php
    }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario
            <input type="text" name="usuario" id="usuario" value="<?php if (isset($usuario)) echo $usuario; ?>">
        </label>
        <label for="clave">Clave
            <input type="password" name="clave" id="clave">
        </label>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>

</html>