<?php
// r - Solo lectura, desde el inicio
$archivo = fopen("archivo.txt", "r");

if ($archivo) {
    while (($linea = fgets($archivo)) !== false) {
        echo $linea; // respeta los saltos de línea
    }
    fclose($archivo);
} else {
    echo "No se pudo abrir el archivo.";
}
