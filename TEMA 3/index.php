<?php
echo $_SERVER['REQUEST_METHOD'] . "<br/>";
echo "Hola, " . $_GET["nombre"] . "." . "<br/>";
echo "Hola, " . $_GET["nombre"] . " " . $_GET["apellidos"] . "." . "<br/>";

if (is_null($_GET["edad"])) {
    echo "Edad es null<br/>";
} else {
    echo "Edad no es null<br/>";
}

if (empty($_GET["edad"])) {
    echo "Edad es empty<br/>";
}
