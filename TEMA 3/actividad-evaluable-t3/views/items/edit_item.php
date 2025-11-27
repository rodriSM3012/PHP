<?php
require_once("../../config/db.php");
require_once("../../model/Item.php");

$itemId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($itemId <= 0) {
    echo "ID de objeto inválido.";
    exit;
}

$item = new Item($db);
if (!$item->loadById($itemId)) {
    echo "Objeto no encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $item->setName(trim($_POST['name']))
        ->setDescription(trim($_POST['description']))
        ->setImg(trim($_POST['img']));
    if ($item->save()) {
        header("Location: list_item.php");
        exit;
    } else {
        echo "Error al actualizar el objeto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Objeto</title>
</head>

<body>
    <h1>Editar Objeto</h1>
    <form method="POST">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($item->getName()) ?>" required><br>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description"
            required><?= htmlspecialchars($item->getDescription()) ?></textarea><br>

        <label for="type">Tipo:</label>
        <input type="number" name="type" id="type" value="<?= htmlspecialchars($item->getType()) ?>" required><br>

        <label for="effect">Efecto:</label>
        <input type="number" name="effect" id="effect" value="<?= htmlspecialchars($item->getEffect()) ?>" required><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>

</html>