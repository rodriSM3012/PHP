<?php
 
$host = 'localhost';//en principio no cambia
$dbname = 'todo';//nombre base de datos
$username = 'root';
$password = '';
 
//En lugar de hacer un try-catch en cada pagina, se hace en esta unicamente y se llama desde otras páginas
try{
    //Para poder meter variables en medio de un string se usa ""
    $db = new PDO("mysql:
        host=$host;
        dbname=$dbname;
        charset=utf8",
        $username,
        $password);
        // echo "Conexión realizada correctamente";
} catch (PDOException $e){
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
 
 

