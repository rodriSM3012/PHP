<?php
// r - Lectura y escritura, desde el inicio. Sobreescribe los caracteres existentes.
$archivo = fopen("archivo.txt", "r+");

if ($archivo) {
    // fseek($archivo, 0, SEEK_END); // con esto podemos ir al final del contenido
    fwrite($archivo, "\nLínea añadida con r+");
    rewind($archivo); // volver al inicio
    while (($linea = fgets($archivo)) !== false) {
        echo nl2br($linea);
    }
    fclose($archivo);
} else {
    echo "No se pudo abrir el archivo.";
}
