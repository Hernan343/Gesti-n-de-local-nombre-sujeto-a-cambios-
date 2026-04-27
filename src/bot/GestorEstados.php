<?php
namespace App\Bot;

class GestorEstados {
    private static $archivo = __DIR__ . '/estados.json';

    public static function obtenerEstado($telefono) {
        if (!file_exists(self::$archivo)) return ['paso' => 'INICIO', 'datos' => []];
        
        $estados = json_decode(file_get_contents(self::$archivo), true);
        return $estados[$telefono] ?? ['paso' => 'INICIO', 'datos' => []];
    }

    public static function actualizarEstado($telefono, $paso, $datosExtra = []) {
        $estados = file_exists(self::$archivo) ? json_decode(file_get_contents(self::$archivo), true) : [];
        $actual = self::obtenerEstado($telefono);

        $estados[$telefono] = [
            'paso' => $paso,
            'datos' => array_merge($actual['datos'], $datosExtra)
        ];
        file_put_contents(self::$archivo, json_encode($estados));
    }
}
