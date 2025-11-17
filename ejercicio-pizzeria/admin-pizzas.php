<?php
require_once "./bbdd.php";

session_start();

if (!isset($_SESSION["rol"])) {
    header("Location: login.php");
} else if ($_SESSION["rol"] != "admin") {
    header("Location: index.php");
}

$conecta = new PDO($cadena_conexion, $usuario, $clave);
$query = "SELECT id, nombre, precio, imagen FROM pizzas"; // no se puede hacer SELECT *
$consulta = $conecta->prepare($query);
$consulta->execute();
$pizzas = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria La Mía Masa!</title>
    <style>
        img {
            width: 150px;
        }
    </style>
</head>

<body>
    <?php require_once "./menu.php" ?>

    <h1>Administración de Pizzas</h1>
    <p><a href="./insert-pizza.php">Añadir una pizza</a></p>

    <table border="1" cellpadding="10" cellspacing="10">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($pizzas as $pizza) { ?>
            <tr>
                <td><img src="./assets/images/pizzas/<?php echo htmlspecialchars($pizza["imagen"]) ?>" alt=""></td>
                <td><?php echo htmlspecialchars($pizza["nombre"]) ?></a></td>
                <td><?php echo $pizza["precio"] ?>€</td>
                <td><a href="update-pizza.php?id=<?= $pizza['id'] ?>">Modificar</a></td>
                <td><a href="delete-pizza.php?id=<?= $pizza['id'] ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>