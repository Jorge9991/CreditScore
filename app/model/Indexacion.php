<?php

class Indexacion {

    //Atributos
    private $idIndexacion;
    private $descripcion;
    private $estado;

    //Constructores
    function __construct($idIndexacion = 0, $descripcion = "", $estado = 0) {
        $this->idIndexacion = $idIndexacion;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    //Getter&Setter
    function getIdIndexacion() {
        return $this->idIndexacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdIndexacion($idIndexacion) {
        $this->idIndexacion = $idIndexacion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
