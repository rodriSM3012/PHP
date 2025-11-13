<?php
session_start();
session_destroy(); // borra todas las variables de sesion
// setcookie("user", "", time() - 60 * 60); // borra la cookie
header("Location: index.php");
