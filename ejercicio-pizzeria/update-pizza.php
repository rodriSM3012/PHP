<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("Location: login.php");
} else if ($_SESSION["rol"] != "admin") {
    header("Location: index.php");
}
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$mensaje = "";

$conecta = new PDO('mysql:host=localhost;dbname=pizzerialamiamasa', 'root', '');

$query = "SELECT nombre, descripcion, precio, imagen FROM pizzas WHERE id = :id";
$consulta = $conecta->prepare($query);
$consulta->execute([':id' => $id]);
$pizza = $consulta->fetch(PDO::FETCH_ASSOC);

// Obtener todos los ingredientes
$queryIng = "SELECT id, nombre FROM ingredientes ORDER BY nombre";
$consultaIng = $conecta->prepare($queryIng);
$consultaIng->execute();
$ingredientes = $consultaIng->fetchAll(PDO::FETCH_ASSOC);

// Obtener ingredientes actuales de la pizza
$queryPizzaIng = "SELECT id_ingrediente FROM pizza_ingrediente WHERE id_pizza = :id";
$stmtPizzaIng = $conecta->prepare($queryPizzaIng);
$stmtPizzaIng->execute([':id' => $id]);
$ingredientesActuales = $stmtPizzaIng->fetchAll(PDO::FETCH_COLUMN);


// Si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $pizza['imagen']; // por defecto, la imagen actual
    $seleccionados = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : [];

    // Procesar imagen si se ha subido
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $archivo = $_FILES['imagen'];
        $tipo = mime_content_type($archivo['tmp_name']);

        if ($tipo === 'image/jpeg') {
            // Borrar imagen anterior
            $rutaAnterior = 'images/pizzas/' . $pizza['imagen'];
            if (file_exists($rutaAnterior)) {
                unlink($rutaAnterior);
            }

            // Generar nombre único
            $cadena = bin2hex(random_bytes(5));
            $nombreImagen = pathinfo($archivo['name'], PATHINFO_FILENAME);
            $nombreFinal = $nombreImagen . '_' . $cadena . '.jpg';

            // Mover imagen
            move_uploaded_file($archivo['tmp_name'], 'images/pizzas/' . $nombreFinal);
            $imagen = $nombreFinal;
        } else {
            $mensaje = "❌ Solo se permiten imágenes JPG.";
        }
    }

    // Actualizar pizza si no hubo error de imagen
    if (!$mensaje) {
        $query = "UPDATE pizzas SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen WHERE id = :id";
        $consulta = $conecta->prepare($query);
        $consulta->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':imagen' => $imagen,
            ':id' => $id
        ]);
        // Actualizar relaciones pizza_ingrediente: eliminar las antiguas y añadir las nuevas
        $delRel = $conecta->prepare("DELETE FROM pizza_ingrediente WHERE id_pizza = :id_pizza");
        $delRel->execute([':id_pizza' => $id]);
        if (!empty($seleccionados)) {
            $insRel = $conecta->prepare("INSERT INTO pizza_ingrediente (id_pizza, id_ingrediente) VALUES (:id_pizza, :id_ingrediente)");
            foreach ($seleccionados as $idIngred) {
                $insRel->execute([':id_pizza' => $id, ':id_ingrediente' => (int)$idIngred]);
            }
        }
        $mensaje = "✅ Pizza actualizada correctamente.";
        $query = "SELECT nombre, descripcion, precio, imagen FROM pizzas WHERE id = :id";
        $consulta = $conecta->prepare($query);
        $consulta->execute([':id' => $id]);
        $pizza = $consulta->fetch(PDO::FETCH_ASSOC);
        // volver a cargar ingredientes actuales
        $stmtPizzaIng->execute([':id' => $id]);
        $ingredientesActuales = $stmtPizzaIng->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar Pizza</title>
</head>

<body>
    <?php include 'menu.php'; ?>
    <h1>Modificar Pizza</h1>

    <?php if ($mensaje): ?>
        <p style="color: green; font-weight: bold;"><?= $mensaje ?></p>
    <?php endif; ?>

    <?php if ($pizza): ?>
        <form method="post" enctype="multipart/form-data">
            <p>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($pizza['nombre']) ?>"></p>
            <p>Descripción:<br><textarea name="descripcion" rows="4" cols="40"><?= htmlspecialchars($pizza['descripcion']) ?></textarea></p>
            <p>Precio: <input type="text" name="precio" value="<?= $pizza['precio'] ?>"></p>
            <p>Imagen actual:<br><img src="images/pizzas/<?= htmlspecialchars($pizza['imagen']) ?>" width="150"></p>
            <p>Subir nueva imagen (.jpg): <input type="file" name="imagen" accept=".jpg,image/jpeg"></p>
            <p>Ingredientes:<br>
                <?php if (!empty($ingredientes)): ?>
                    <?php foreach ($ingredientes as $ing): ?>
                        <label>
                            <input type="checkbox" name="ingredientes[]" value="<?= $ing['id'] ?>" <?php if (in_array($ing['id'], $ingredientesActuales)) echo 'checked'; ?>> <?= htmlspecialchars($ing['nombre']) ?>
                        </label><br>
                    <?php endforeach; ?>
                <?php else: ?>
                    <em>No hay ingredientes definidos.</em>
                <?php endif; ?>
            </p>
            <p><input type="submit" value="Guardar cambios"></p>
        </form>
    <?php else: ?>
        <p>Pizza no encontrada.</p>
    <?php endif; ?>
</body>

</html>