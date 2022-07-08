<?php

/** Libreria creada por Jurdikd
 * Alias Terror
 */
class FunctionTerror
{
    public static function cambiarComas_puntos($num)
    {
        # Cambiar comas por puntos...
        $convertido = str_replace(',', '.', $num);
        return $convertido;
    }
}
