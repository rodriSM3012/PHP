<?php

if(isset($_GET["msg"])) {
    $msg = $_GET["msg"];
} else {
    $msg = "Seleccione su fichero.";
}

if ($msg==0) {
    $msg="Se ha producido un error. Inténtelo más tarde.";
}
if ($msg==1) {
    $msg="Fichero subido correctamente. Puede subir otro.";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload files</title>
</head>
<body>
    <h1>Subir ficheros</h1>
    <p><?php echo $msg; ?></p>
    <form action="15-upload-files-processing.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</body>
</html>