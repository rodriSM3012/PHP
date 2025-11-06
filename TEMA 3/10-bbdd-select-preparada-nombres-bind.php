<?php
$cadena_conexion = "mysql:dbname=users;host=localhost";
$usuario = "root";
$clave = "";

try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito.<br/><br/>";

    $variable1 = "admin";
    $variable2 = 1;

    $query = "SELECT user, rol FROM users WHERE rol = :rol AND id = :id";
    $consulta = $conecta->prepare($query);
    $consulta->bindParam(":rol", $variable1); // cambia los parametros por la variable
    $consulta->bindParam(":id", $variable2);
    $consulta->execute();

    echo "Registros encontrados: " . $consulta->rowCount() . "<br/><br/>";

    foreach ($consulta as $row) {
        print $row["user"] . " - ";
        print $row["rol"] . "<br/>";
    }
} catch (PDOException $e) {
    echo "Error conectando a la base de datos: " . $e->getMessage();
}