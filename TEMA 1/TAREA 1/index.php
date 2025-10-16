<?php
$animales = [
    "Perro",
    "Gato",
    "Ratón",
    "Pájaro",
    "Caballo"
];
$animalesBackup = $animales;

// array asociativo 
$animalesSonando = [
    "Perro" => "Guau",
    "Gato" => "Miau",
    "Ratón" => "Chirp",
    "Pájaro" => "Pío",
];
$animalesSonandoBackup = $animalesSonando;

include "como-hace-el-animal.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES - Tema 2 - Tarea 01</title>
</head>

<body>
    <h1>DWES - Tema 2 - Tarea 01</h1>
    <h2>Arrays</h2>
    <ul>
        <?php
        foreach ($animales as $animal) { ?>
            <li><?php echo $animal ?></li>
        <?php } ?>
    </ul>

    <h2>Ordenado</h2>
    <ul>
        <?php
        sort($animales);
        foreach ($animales as $animal) { ?>
            <li><?php echo $animal; ?></li>
        <?php } ?>
    </ul>

    <h2>Orden inverso</h2>
    <ul>
        <?php
        rsort($animales);
        foreach ($animales as $animal) { ?>
            <li><?php echo $animal; ?></li>
        <?php } ?>
    </ul>

    <h2>Orden con for</h2>
    <ul>
        <?php for ($i = 0; $i < count($animales); $i++) {
            $animal = $animales[$i]; ?>
            <li><?php echo $animal; ?></li>
        <?php } ?>
    </ul>

    <h2>Array asociativo</h2>
    <ul>
        <?php
        foreach ($animalesSonando as $key => $value) { ?>
            <li><?php echo "El $key hace $value" ?></li>
        <?php } ?>
    </ul>

    <h2>Con function</h2>
    <ul>
        <?php
        foreach ($animales as $animal) { ?>
            <li><?php echo comoHaceElAnimal($animal, $animalesSonando); ?></li>
        <?php } ?>
    </ul>
</body>

</html>