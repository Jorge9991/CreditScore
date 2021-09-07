<?php

class Jornada {

    //Atributos
    private $idJornada;
    private $descripcion;
    private $estado;

//Constructor
    function __construct($idJornada = 0, $descripcion = "", $estado = 0) {
        $this->idJornada = $idJornada;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    function getIdJornada() {
        return $this->idJornada;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdJornada($idJornada) {
        $this->idJornada = $idJornada;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
