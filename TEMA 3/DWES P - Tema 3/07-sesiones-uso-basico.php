<?php
session_start(); //creamos la sesión o nos unimos a ella

if (!isset($_SESSION["count"])) { //Podemos acceder a la reunión cuando la creamos
    $_SESSION["count"] = 0;
    $_SESSION["usuario"] = "Pedro";
    $_SESSION["rol"] = "admin";
} else {
    $_SESSION["count"]++;
}

print_r($_SESSION);
echo "<br>";
echo "Hola, " . $_SESSION["usuario"] . ". Has estado aqui " . $_SESSION["count"] . " veces<br>";
echo "<a href='07-sesiones-uso-basico-2.php'>Siguiente</a>";
