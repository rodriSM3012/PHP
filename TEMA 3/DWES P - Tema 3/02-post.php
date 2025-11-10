<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <style>
        label {
            display: block;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <!-- Probar con 03-login-basico.php y con 04-login-basico-2.php -->
    <form action="04-login-basico-2.php" method="POST">
        <label for="nombre">Nombre:
            <input type="text" name="usuario" id="usuario">
        </label>
        <label for="password">Contraseña:
            <input type="password" name="password" id="pasword">
        </label>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>

</html>