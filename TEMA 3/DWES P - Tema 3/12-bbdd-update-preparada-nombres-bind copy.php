<?php
$cadena_conexion = 'mysql:dbname=users;host=localhost';
$usuario = 'root';
$clave = '';

try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito.<br><br>";
    $user = "Manolo";
    $password = "6666";
    $rol = "user";
    $id = 4;
    $query = 'UPDATE users SET user=:user, password=:password, rol=:rol WHERE id=:id';
    $consulta = $conecta->prepare($query);
    $consulta->bindParam(":user", $user);
    $consulta->bindParam(":password", $password);
    $consulta->bindParam(":rol", $rol);
    $consulta->bindParam(":id", $id);
    // $consulta->execute();

    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
            echo "Actualización realizada correctamente.";
        } else {
            echo "La actualización no afectó ninguna fila.";
        }
    } else {
        echo "Error al ejecutar la actualización.";
    }
} catch (PDOException $e) {
    echo 'Error conectando a la base de datos: ' . $e->getMessage();
}
