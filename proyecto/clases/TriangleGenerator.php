<?php
class TriangleGenerator
{
    public function generateTriangle(int $altura): string
    {
        $resultado = "";
        /*
        for ($i = 1; $i <= $altura; $i++) {
            $numAsteriscos = $i * 2 - 1;
            $espacios = $altura - $i;
            $linea = "";
            for ($j = 0; $j < $espacios; $j++)
                $linea .= "&nbsp;";
            for ($k = 0; $k < $numAsteriscos; $k++)
                $linea .= "*";
        }
        */

        for ($i = 1; $i <= $altura; $i++) {
            $resultado .= '<p style ="font-family:monospace" >';
            $numAsteriscos = $i * 2 - 1;
            $espacios = $altura - $i;
            $linea = "";

            for ($j = 0; $j < $espacios; $j++)
                $linea .= "&nbsp;";
            for ($k = 0; $k < $numAsteriscos; $k++)
                $linea .= "*";

            $resultado .= "</p>\n";
        }
        return $resultado;

        /*
        for ($fila = 1; $fila <= $altura; $fila++) {
            $resultado .= '<p style ="font-family:monospace" >';
            $linea = "";
            for ($col = 1; $col <= $altura; $col++) {
                if ($fila == 1 || $fila == $altura || $col == 1 || $col == $altura) {
                    $linea .= "+";
                } else {
                    $linea .= "&nbsp;";
                }
            }
            $resultado .= "</p>";
        }
        return $resultado;
        */
    }
}