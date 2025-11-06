<?php
$cadena_conexion = "mysql:dbname=users;host=localhost";
$usuario = "root";
$clave = "";

try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito.<br/><br/>";

    $user = "Paco";
    $password = "9876";
    $rol = "admin";

    $variable1 = "admin";
    $variable2 = 1;

    $query = "INSERT user (user, $password, rol) VALUES (:user, :password, :rol)";
    $consulta = $conecta->prepare($query);
    $consulta->bindParam(":user", $user); // cambia los parametros por la variable
    $consulta->bindParam(":password", $password);
    $consulta->bindParam(":rol", $rol);

    if ($consulta->execute()) {
        if ($consulta->rowCount() > 0) {
            echo "Inserción realizada correctamente.";
        } else {
            echo "La insrción no afectó niguna fila.";
        }
    } else {
        echo "Error al ejecutar la inserción.";
    }

    echo "Registros encontrados: " . $consulta->rowCount() . "<br/><br/>";
} catch (PDOException $e) {
    echo "Error conectando a la base de datos: " . $e->getMessage();
}