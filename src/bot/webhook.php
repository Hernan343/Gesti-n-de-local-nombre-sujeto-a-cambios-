<?php
require_once 'GestorEstados.php';
require_once 'Utils/Validador.php';
require_once 'Plantillas/Mensajes.php';

use App\Bot\GestorEstados;
use App\Bot\Utils\Validador;
use App\Bot\Plantillas\Mensajes;

// recepción de mensajes
$json = file_get_contents('php://input');
$datos = json_decode($json, true);

$telefono = $datos['from']; // numero desde el que se escribre
$mensaje = trim($datos['body']); // el contenido

// verificar el estado
$estadoActual = GestorEstados::obtenerEstado($telefono);

// los estados
switch ($estadoActual['paso']) {
    case 'INICIO':
        enviarMensaje($telefono, Mensajes::BIENVENIDA);
        GestorEstados::actualizarEstado($telefono, 'ESPERANDO_MENU');
        break;

    case 'ESPERANDO_MENU':
        if (Validador::esOpcionValida($mensaje)) {
            if ($mensaje == '1') {
                enviarMensaje($telefono, Mensajes::PEDIR_NOMBRE);
                GestorEstados::actualizarEstado($telefono, 'ESPERANDO_NOMBRE');
            }
        
        } else {
            enviarMensaje($telefono, Mensajes::ERROR_OPCION);
        }
        break;

    case 'ESPERANDO_FECHA':
        if (Validador::esFechaValida($mensaje)) {
            GestorEstados::actualizarEstado($telefono, 'ESPERANDO_TURNO', ['fecha' => $mensaje]);
            enviarMensaje($telefono, Mensajes::PEDIR_TURNO);
        } else {
            enviarMensaje($telefono, Mensajes::ERROR_FECHA);
        }
        break;
}

function enviarMensaje($to, $text) {
   
}