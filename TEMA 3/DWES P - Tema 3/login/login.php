<?php
session_start();

$message = "Introduzco su usuario y contraseña.";
$user = "";

if (isset($_COOKIE["user"]) && $_COOKIE["user"] !== '') {
    $user = $_COOKIE["user"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("./bbdd.php");
    try {
        $conecta = new PDO($cadena_conexion, $usuario, $clave);

        $user = $_POST["user"];
        $password = $_POST["password"];

        $query = 'SELECT user, rol FROM users WHERE user = :user AND password= :password';
        $consulta = $conecta->prepare($query);
        $consulta->bindParam(":user", $user);
        $consulta->bindParam(":password", $password);
        $consulta->execute();

        if($consulta->rowCount() > 0){
            foreach ($consulta as $row) {
                $rol = $row["rol"];
            }

            setcookie("user", $user, time() + 60 * 60);
            
            $_SESSION["user"] = $user;
            $_SESSION["rol"] = $rol;
            
            header("Location: index.php");
        } else {
            $message = "Revise su usuario y contraseña.";
        }
    } catch (PDOException $e) {
        // echo 'Sin conexión: ' . $e->getMessage();
        $message = "Se ha producido un error. Inténtelo más tarde.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identificación</title>
</head>

<body>
    <h1>Login</h1>
    <p><?php echo $message; ?></p>

    <form method="post" action="">
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user" value="<?php echo $user; ?>" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>

</html>