<?php
namespace App\Bot\Utils;

class Validador {
    public static function esFechaValida($texto) {
        // Valida formato DD/MM usando expresiones regulares
        return preg_match('/^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[012])$/', $texto);
    }

    public static function esOpcionValida($texto, $opciones = ['1', '2']) {
        return in_array(trim($texto), $opciones);
    }
}