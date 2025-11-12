<?php
// w solo escritura desde el inicio, elimina el contenido previo 
// si el archivo no existe intenta crearlo
$archivo = fopen("archivo.txt", "w");

if ($archivo) {
    fwrite($archivo, "Primera línea\nSegunda línea\n");
    fclose($archivo);
} else {
    echo "No se puedo abrir el archivo.";
}