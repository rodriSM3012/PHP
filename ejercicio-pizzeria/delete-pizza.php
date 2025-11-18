<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("Location: login.php");
} else if ($_SESSION["rol"] != "admin") {
    header("Location: index.php");
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$conecta = new PDO('mysql:host=localhost;dbname=pizzerialamiamasa', 'root', '');

$query = "SELECT nombre, descripcion, precio, imagen FROM pizzas WHERE id = :id";
$consulta = $conecta->prepare($query);
$consulta->execute([':id' => $id]);
$pizza = $consulta->fetch(PDO::FETCH_ASSOC);

// Si se ha confirmado la eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
    if ($_POST['confirmar'] == 'si') {
        // Borrar imagen
        $rutaImagen = 'images/pizzas/' . $pizza['imagen'];
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }

        // Borrar pizza de la base de datos
        $query = "DELETE FROM pizzas WHERE id = :id";
        $consulta = $conecta->prepare($query);
        $consulta->execute([':id' => $id]);

        header("Location: admin-pizzas.php");
        exit();
    } else {
        // Si elige "no", volver al admin
        header("Location: admin-pizzas.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar Pizza</title>
</head>

<body>
    <?php include 'menu.php'; ?>
    <h1>Eliminar Pizza</h1>

    <?php if ($pizza): ?>
        <p><strong>¿Está seguro de que desea eliminar esta pizza?</strong></p>
        <p>
            <strong>Nombre:</strong> <?= htmlspecialchars($pizza['nombre']) ?><br>
            <strong>Descripción:</strong> <?= htmlspecialchars($pizza['descripcion']) ?><br>
            <strong>Precio:</strong> <?= $pizza['precio'] ?> €<br>
            <strong>Imagen:</strong><br>
            <img src="images/pizzas/<?= htmlspecialchars($pizza['imagen']) ?>" width="150">
        </p>

        <form method="post">
            <input type="hidden" name="confirmar" value="si">
            <input type="submit" value="Sí, eliminar">
        </form>

        <form method="post">
            <input type="hidden" name="confirmar" value="no">
            <input type="submit" value="No, cancelar">
        </form>
    <?php else: ?>
        <p>Pizza no encontrada.</p>
    <?php endif; ?>
</body>

</html>
