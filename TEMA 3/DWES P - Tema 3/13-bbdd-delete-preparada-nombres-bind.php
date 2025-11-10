<?php
$cadena_conexion = 'mysql:dbname=users;host=localhost';
$usuario = 'root';
$clave = '';

try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    $id = 2;
    $query = 'DELETE FROM users WHERE id = :id';
    $consulta = $conecta->prepare($query);
    $consulta->bindParam(":id", $id);
    // $consulta->execute();

    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
            echo "Borrado realizado correctamente.";
        } else {
            echo "El borrado no afectó ninguna fila.";
        }
    } else {
        echo "Error al ejecutar el borrado.";
    }
} catch (PDOException $e) {
    echo 'Error conectando a la base de datos: ' . $e->getMessage();
}
