<!-- Archivo de inicio de sesión: gestiona la autenticación de usuarios -->
<?php
session_start();

// Mensaje inicial y variable para almacenar el usuario
$message = "Introduzca su usuario y contraseña.";
$user = "";

// Comprobar si existe una cookie con el nombre de usuario
// if (isset($_COOKIE["user"]) && $_COOKIE["user"] !== '') {
//     $user = $_COOKIE["user"]; // Precargar el usuario desde la cookie
// }

// Verificar si el formulario ha sido enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir configuración de base de datos
    require_once("./bbdd.php");

    try {
        // Crear conexión PDO a la base de datos
        $conecta = new PDO($cadena_conexion, $usuario, $clave);

        // Obtener credenciales del formulario
        $user = $_POST["user"];
        $password = $_POST["password"];

        // Preparar consulta para verificar credenciales
        $query = 'SELECT user, rol FROM users WHERE user = :user AND password = :password';
        $consulta = $conecta->prepare($query);

        // Vincular parámetros para prevenir inyecciones SQL
        $consulta->bindParam(":user", $user);
        $consulta->bindParam(":password", $password);
        $consulta->execute();

        // Verificar si se encontró un usuario válido
        if ($consulta->rowCount() > 0) {
            // Obtener el rol del usuario
            foreach ($consulta as $row) {
                $rol = $row["rol"];
            }

            // Crear cookie recordatoria por 1 hora
            // setcookie("user", $user, time() + 60 * 60);

            // Establecer variables de sesión
            $_SESSION["user"] = $user;
            $_SESSION["rol"] = $rol;

            // Redirigir al portal principal
            header("Location: index.php");
        } else {
            $message = "Revise su usuario y contraseña."; // Credenciales incorrectas
        }
    } catch (PDOException $e) {
        // Manejo de errores de conexión
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
    <?php require_once "./menu.php"; ?>
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