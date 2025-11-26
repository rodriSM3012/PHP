<?php
$host = 'localhost';
$dbname = 'rpg-juego';
$username = 'root';
$password = '';


try {
    $db = new PDO(
        "mysql:
        host=$host;
        dbname=$dbname;
        charset=utf8",
        $username,
        $password
    );
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}


