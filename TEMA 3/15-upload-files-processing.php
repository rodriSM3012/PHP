<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['image'];
    var_dump($file);
    // Verificar errores
    if ($file["error"] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/"; // Carpeta donde guardar los ficheros
        $fileName = basename($file["name"]); // Nombre original del fichero
        $targetFile = $uploadDir . uniqid() . "_" . $fileName; // Nombre único
        // Mover el archivo al directorio de destino
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $name = $fileName;
            $path = $uploadDir;
            $type = $file["type"];
            require_once("15-upload-files-insert-ddbb.php");
            //header("Location: 15-upload-files.php?msg=1&id=$id");
        } else {
            header("Location: 15-upload-files.php?msg=0");
        }
    } else {
        header("Location: 15-upload-files.php?msg=0");
    }
}
