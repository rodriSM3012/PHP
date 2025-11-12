<?php
$directory = "upload/";
if (is_dir($directory)) {
    $files = scandir($directory); // devuelve un array
    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            echo $file . "<br/>";
        }
    }
}

/*
if (is_dir($directory)) {
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            unlink($directory . $file);
        }
    }
}
*/
