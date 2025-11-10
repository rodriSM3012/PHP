<?php
$cadena_conexion = 'mysql:dbname=users;host=localhost';
$usuario = 'root';
$clave = '';

try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito.<br><br>";
    $query = 'SELECT user, rol FROM users WHERE rol = :rol';
    $consulta = $conecta->prepare($query);
    $consulta->execute(array(":rol"=>"admin"));

    echo "Registros encontrados: " . $consulta->rowCount() . "<br><br>";
    foreach ($consulta as $row) {
        print $row["user"] . " - ";
        print $row["rol"] . "<br>";
    }
} catch (PDOException $e) {
    echo 'Error conectando a la base de datos: ' . $e->getMessage();
}
