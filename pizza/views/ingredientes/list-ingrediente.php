<?php

require_once("../../config/db.php");
require_once("../../model/Ingrediente.php");

$ingredientes = Ingrediente::getAll($db);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar ingredientes</title>
</head>

<body>
    <h1>Menú:</h1>
    <?php include('../partials/_menu.php') ?>


    <h1>Ingredientes:</h1>
    <table border="1" cellspacing="10" cellpadding="10">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredientes as $ingrediente) : ?>
                <tr>
                    <td><?= $ingrediente['nombre'] ?></td>
                    <td><a href="./edit-ingrediente.php?id=<?= $ingrediente['id'] ?>">Editar</a><br>
                        <a href="./delete-ingrediente.php?id=<?= $ingrediente['id'] ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>