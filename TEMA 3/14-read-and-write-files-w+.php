<?php
// w solo escritura desde el inicio, elimina el contenido previo 
// si el archivo no existe intenta crearlo
$archivo = fopen("archivo.txt", "w+");

if ($archivo) {
    fwrite($archivo, "Contenido nuevo\nOtra línea\n");
    rewind($archivo); // volver al principio
    while (($linea = fgets($archivo)) !== false) { // lee cada linea y para cuando no hay mas lineas
        echo nl2br($linea); // los saltos de linea los convierte en <br/>
    }
    fclose($archivo);
} else {
    echo "No se puedo abrir el archivo.";
}