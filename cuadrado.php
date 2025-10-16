<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <p>
        <?php
        $altura = 13;
        for ($i = 0; $i <= $altura; $i++) {
            if ($i == 0 || $i == $altura) {
                for ($j = 0; $j <= $altura; $j++) echo "* ";
            } else {
                echo "* ";
                for ($k = 0; $k < $altura - 1; $k++) echo "&nbsp; ";
                echo "* ";
            }
            echo "<br/>";
        } ?>
    </p>

    <!-- de clase ↓ ↓ ↓ ↓ -->
    <p>
        <?php
        $altura = 13;
        for ($fila = 1; $fila <= $altura; $fila++) {
            $linea = "";

            for ($col = 1; $col <= $altura; $col++) {
                if ($fila == 1 || $fila == $altura || $col == 1 || $col == $altura) {
                    $linea .= "*";
                } else {
                    $linea .= "&nbsp;";
                }
            } ?>
    <p><?php echo $linea ?></p>
<?php
        }
?>
</p>

</body>

</html>