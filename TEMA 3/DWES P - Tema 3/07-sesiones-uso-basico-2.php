<?php
session_start();

if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
} else {
    $_SESSION["count"]++;
}

echo "La variable count vale: " . $_SESSION["count"] . "<br>";
echo "El usuario es: " . $_SESSION["usuario"] . "<br>";
echo "Su rol es: " . $_SESSION["rol"] . "<br>";
echo "<a href='07-sesiones-uso-basico.php'>Volver</a>";
