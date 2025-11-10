<?php
$cadena_conexion = 'mysql:dbname=users;host=localhost';
$usuario = 'root';
$clave = '';

if (isset($_POST)) {
    try {
        $conecta = new PDO($cadena_conexion, $usuario, $clave);
        $user = $_POST["user"];
        $password = $_POST["password"];
        $rol = "user";

        $query = 'INSERT INTO users (user, password, rol) VALUES (:user, :password, :rol)';
        $consulta = $conecta->prepare($query);
        $consulta->bindParam(":user", $user);
        $consulta->bindParam(":password", $password);
        $consulta->bindParam(":rol", $rol);
        // $consulta->execute();

        if ($consulta->execute()) {
            if ($consulta->rowCount() > 0) {
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
}
