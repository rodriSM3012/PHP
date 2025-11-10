<?php

/*
http://www.loquesea.com/index.php?nombre=Paco&apellidos=perez%20garcia
*/

echo $_SERVER['REQUEST_METHOD'] . "<br><br>";

$nombre = $_GET["nombre"];
$apellidos = $_GET["apellidos"];

echo "Hola, " . $nombre . "." . "<br>";
echo "Hola, " . $nombre . " " . $apellidos . "." . "<br>";

if (is_null($_GET["edad"])) {
    echo "Edad es null<br>";
} else {
    echo "Edad no es null<br>";
}

if (empty($_GET["edad"])) {
    echo "Edad es empty<br>";
}

echo $_SERVER["PHP_SELF"] . "<br>";
echo $_SERVER['QUERY_STRING'];
