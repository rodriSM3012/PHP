<?php
function saludo1()
{
    echo "Hola, bienvenido a mi sitio web.";
}

function saludo2()
{
    return "Hola, bienvenido a mi sitio web.";
}

saludo1();
echo "<br/>";
$contestacion = saludo2();
echo $contestacion;

function saludo3($nombre = "Desconocido") // nombre por defecto que aparece si no se introduce ninguno
{
    return "Hola $nombre, bienvenido a mi sitio web.";
}

$contestacion = saludo3("Paco");
echo "<br/>$contestacion";

function sumaResta($numero1, $numero2, $operacion)
{
    if ($operacion == "suma") {
        return $numero1 + $numero2;
    } else if ($operacion == "resta") {
        return $numero1 - $numero2;
    } else {
        return "La operación introducida no es válida.";
    }
}

echo sumaResta($numero1, $numero2, $operacion);
