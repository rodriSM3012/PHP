<?php
if ($_POST["usuario"] == "usuario" && $_POST["password"] == "1234") {
    header("Location: bienvenido.html");
    // antes del header no puede haber un echo 
} else {
    header("Location: error.html");
}