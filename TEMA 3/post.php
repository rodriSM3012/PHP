<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: block;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <!-- si se envia con post en vez de get no aparecen los contenidos del form en la url  -->
    <form action="login-basico.php" method="POST">
        <label for="nombre">Nombre:
            <input type="text" name="usuario" id="usuario">
        </label>
        <label for="password">Contraseña
            <input type="text" name="password" id="password">
        </label>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>

</html>