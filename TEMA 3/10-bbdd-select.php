<?php
$cadena_conexion = "mysql:dbname=users;host=localhost";
$usuario = "root";
$clave = "";

// comprobar que se puede conectar y si no que avise 
try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión realizada con éxito.<br/><br/>";
    // variable para crear el SELECT 
    $query = "SELECT user, rol FROM users";
    // crea consulta en conecta (instancia donde ya me he conectado a la bbdd) 
    $consulta = $conecta->query($query);
    // ahora ya hay una variable consulta con todo lo que ha mandado la bbdd
    // consulta es un array 

    // escribe cuantas filas se han encontrado
    echo "Registros encontrados: " . $consulta->rowCount() . "<br/><br/>"; // consulta es un objeto
    // recorrer el array del objeto 
    foreach ($consulta as $row) {
        print $row["user"] . " - ";
        print $row["rol"] . "<br/>";
    }
} catch (PDOException $e) {
    echo "Error conectando a la base de datos: " . $e->getMessage();
    // getMessage es el mensaje de error
}