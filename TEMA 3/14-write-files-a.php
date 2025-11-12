<?php
// w solo escritura desde el inicio, elimina el contenido previo 
// si el archivo no existe intenta crearlo
$archivo = fopen("archivo.txt", "a");

if ($archivo) {
    fwrite($archivo, "\nLínea añadida con a.");
    fclose($archivo);
} else {
    echo "No se puedo abrir el archivo.";
}