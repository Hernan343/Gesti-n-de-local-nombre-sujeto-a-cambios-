<?php
namespace App\Bot\Plantillas;

class Mensajes {
    // Definimos las constantes para evitar errores de dedo en el código
    const BIENVENIDA = "¡Hola! Bienvenido al sistema de Auto-Agenda. \n\n¿Qué deseas hacer?\n1. Agendar cita\n2. Consultar reserva";
    
    const PEDIR_NOMBRE = "Perfecto, por favor dime tu nombre completo:";
    
    const PEDIR_FECHA = "Dime la fecha para tu cita en formato DD/MM (ejemplo: 22/04):";
    
    const PEDIR_TURNO = "Elige un turno:\n1. Mañana (09:00 - 12:00)\n2. Tarde (14:00 - 18:00)";
    
    const ERROR_OPCION = " Opción no válida. Por favor, escribe 1 o 2:";
    
    const ERROR_FECHA = " El formato de fecha es incorrecto. Intenta de nuevo con DD/MM (ej: 15/05):";

    // Para el mensaje final, usamos una función estática porque lleva variables
    public static function confirmacion($nombre, $fecha, $turno) {
        return "¡Listo, $nombre! \nHemos agendado tu cita para el día $fecha en el turno de la $turno. ";
    }
}