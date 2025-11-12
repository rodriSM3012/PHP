<?php
$directory = "nueva_carpeta/";
if (!is_dir($directory)) {
    mkdir($directory, 0755); // crea la carpeta con permisos
    // permisos 1, 2, 4
    // 7 → todos los permisos
    // 5 → permisos 4 + 1
    echo "Carpeta creada";
}