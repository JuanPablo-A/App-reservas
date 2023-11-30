<?php

namespace Model;

class Cita extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'reservas';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'cantidadPersonas', 'usuarioId'];

    public $id;
    public $fecha;
    public $hora;
    public $cantidadPersonas;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->cantidadPersonas = $args['cantidadPersonas'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
    }
}