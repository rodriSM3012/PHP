<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <?php
    $altura = 15;
    $k = 1;
    for ($i = 0; $i <= $altura; $i++) {
        for ($j = ($altura - $i) - 1; $j >= 0; $j--) echo "&nbsp;";
        for ($k += ($i * 2) - 1; $k > 0; $k--) echo "*";
        echo "<br/>";
    }
    ?>
    <!-- 
    <?php
    $altura = 15;
    // dibujar piramide de 5 pisos 
    for ($i = $altura; $i > 0; $i--) { ?>
        <p>
        <?php
        for ($k = 0; $k <= ($i / 2 - 1); $k++) echo "-";
        for ($j = 0; $j < $altura - $i; $j++) echo "*";
        echo "<br/>";
    } ?></p> 
    -->
    <!-- de clase ↓ ↓ ↓ ↓ -->
    <?php
    $altura = 15;
    for ($i = 1; $i <= $altura; $i++) {
        $numAsteriscos = $i * 2 - 1;
        $espacios = $altura - $i;
        $linea = "";

        for ($j = 0; $j < $espacios; $j++) $linea .= "&nbsp;";
        for ($k = 0; $k < $numAsteriscos; $k++) $linea .= "*";
    ?>
        <p><?php echo $linea ?></p>
    <?php
    }
    ?>
</body>

</html>