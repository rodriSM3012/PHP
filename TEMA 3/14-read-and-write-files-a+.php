<?php
// w solo escritura desde el inicio, elimina el contenido previo 
// si el archivo no existe intenta crearlo
$archivo = fopen("archivo.txt", "a+");

if ($archivo) {
    fwrite($archivo, "\nLínea añadida con a+");
    rewind($archivo);
    while (($linea = fgets($archivo)) !== false) { // lee cada linea y para cuando no hay mas lineas
        echo nl2br($linea); // los saltos de linea los convierte en <br/>
    }
    fclose($archivo);
} else {
    echo "No se puedo abrir el archivo.";
}