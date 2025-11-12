<?php
$directory = "borrar";
if (is_dir($directory)) {
    rmdir($directory);
    echo "Carpeta eliminada.";
}