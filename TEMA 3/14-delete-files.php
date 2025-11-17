<?php
$archivo = 'archivo.txt';

if (file_exists($archivo)) {
    unlink($archivo);
    echo "Archivo eliminado correctamente.";
} else {
    echo "El archivo no existe.";
}