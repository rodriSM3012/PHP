<?php
require_once "./bbdd.php";

$message = "";

// sacado de 10-bbdd-select-preparada-nombres-bind.php
try {
    $conecta = new PDO($cadena_conexion, $usuario, $clave);
    // echo "Conexión realizada con éxito.<br/><br/>";

    // $variable1 = "admin";
    // $variable2 = 1;

    $query = "SELECT id, nombre, precio, imagen FROM pizzas"; // no se puede hacer SELECT *
    $consulta = $conecta->prepare($query);
    $consulta->execute();
    $pizzas = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error conectando a la base de datos: " . $e->getMessage();
}
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
    <?php require_once "menu.php" ?>

    <h1>Lista de Pizzas</h1>
    <?php if ($message == "") { // si se produce un error $message seria algo distinto de vacio y no se ejecutaria ?>
        <table border="1" cellpadding="10" cellspacing="10">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($pizzas as $pizza) { ?>
                <tr>
                    <td><img src="./assets/images/pizzas/<?php echo htmlspecialchars($pizza["imagen"]) ?>" alt=""></td>
                    <td><a href="./pizza.php?id=<?php echo $pizza["id"] ?>"><?php echo htmlspecialchars($pizza["nombre"]) ?></a></td>
                    <td><?php echo $pizza["precio"] ?>€</td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p><?= $message // = echo $message ?></p>
    <?php } ?>
</body>

</html>