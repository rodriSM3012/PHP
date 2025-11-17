<?php
$cadena_conexion = 'mysql:dbname=uploads;host=localhost';
$usuario = 'root';
$clave = '';

    try {
        $conecta = new PDO($cadena_conexion, $usuario, $clave);
        $query = 'INSERT INTO files (name, path, type) VALUES (:name, :path, :type)';
        $consulta = $conecta->prepare($query);
        $consulta->bindParam(":name", $name);
        $consulta->bindParam(":path", $path);
        $consulta->bindParam(":type", $type);
        // $consulta->execute();

        if ($consulta->execute()) {
            if ($consulta->rowCount() > 0) {
                $id = $conecta->lastInsertId();
                echo "Inserción realizada correctamente.";
            } else {
                echo "La inserción no afectó ninguna fila.";
            }
        } else {
            echo "Error al ejecutar la insercción.";
        }
    } catch (PDOException $e) {
        echo 'Error conectando a la base de datos: ' . $e->getMessage();
    }
