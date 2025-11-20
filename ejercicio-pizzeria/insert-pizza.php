<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("Location: login.php");
} else if ($_SESSION["rol"] != "admin") {
    header("Location: index.php");
}

$mensaje = "";
$conecta = new PDO('mysql:host=localhost;dbname=pizzerialamiamasa', 'root', '');

// Obtener lista de ingredientes
$queryIng = "SELECT id, nombre FROM ingredientes ORDER BY nombre";
$consultaIng = $conecta->prepare($queryIng);
$consultaIng->execute();
$ingredientes = $consultaIng->fetchAll(PDO::FETCH_ASSOC);
var_dump($ingredientes);

// Si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = "";
    $ingredientesSeleccionados = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : [];

    // Procesar imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $archivo = $_FILES['imagen'];
        $tipo = mime_content_type($archivo['tmp_name']);

        if ($tipo === 'image/jpeg') {
            // Generar nombre único
            $cadena = bin2hex(random_bytes(5));
            $nombreImagen = pathinfo($archivo['name'], PATHINFO_FILENAME);
            $nombreFinal = $nombreImagen . '_' . $cadena . '.jpg';

            // Mover imagen
            move_uploaded_file($archivo['tmp_name'], './assets/images/pizzas/' . $nombreFinal);
            $imagen = $nombreFinal;
        } else {
            $mensaje = "Solo se permite subir imágenes JPG.";
        }
    } else {
        $mensaje = "Debe seleccionar una imagen.";
    }

    // Insertar pizza si no hubo error
    if (!$mensaje) {
        $query = "INSERT INTO pizzas (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)";
        $consulta = $conecta->prepare($query);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':imagen', $imagen);
        $consulta->execute();

        $idPizza = $conecta->lastInsertId();
        if (!empty($ingredientesSeleccionados)) {
            $queryRel = "INSERT INTO pizza_ingrediente (id_pizza, id_ingrediente) VALUES (:id_pizza, :id_ingrediente)";
            $consultaRel = $conecta->prepare($queryRel);
            foreach ($ingredientesSeleccionados as $idIngred) {
                $consultaRel->execute([':id_pizza' => $idPizza, ':id_ingrediente' => (int) $idIngred]);
            }
        }
        $mensaje = "Pizza insertada correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Pizza</title>
</head>

<body>
    <?php include 'menu.php'; ?>
    <h1>Añadir Pizza</h1>

    <?php if ($mensaje): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>

    <?php if (!$mensaje || strpos($mensaje, '❌') !== false): ?>
        <form method="post" enctype="multipart/form-data">
            <p>Nombre: <input type="text" name="nombre" required></p>
            <p>Descripción:<br><textarea name="descripcion" rows="4" cols="40" required></textarea></p>
            <p>Precio: <input type="text" name="precio" required></p>
            <p>Ingredientes:<br>
                <?php if (!empty($ingredientes)): ?>
                    <?php foreach ($ingredientes as $ing): ?>
                        <label>
                            <input type="checkbox" name="ingredientes[]" value="<?= $ing['id'] ?>">
                            <!-- necesita los [] en name=ingredientes ↑ para que php sepa que es un array -->
                            <?= htmlspecialchars($ing['nombre']) ?>
                        </label><br>
                    <?php endforeach; ?>
                <?php else: ?>
                    <em>No hay ingredientes definidos.</em>
                <?php endif; ?>
            </p>
            <p>Imagen (.jpg): <input type="file" name="imagen" accept=".jpg,image/jpeg" required></p>
            <p><input type="submit" value="Insertar pizza"></p>
        </form>
    <?php else: ?>
        <p><a href="insert-pizza.php">Añadir una pizza</a></p>
    <?php endif; ?>
</body>

</html>