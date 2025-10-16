<?php
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
