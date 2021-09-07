<?php

class TipoProduccion {

    //Atributos
    private $idTipoProduccion;
    private $descripcion;
    private $estado;

    //Constructor
    function __construct($idTipoProduccion = 0, $descripcion = "", $estado = 0) {
        $this->idTipoProduccion = $idTipoProduccion;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

//Getter&Setter
    function getIdTipoProduccion() {
        return $this->idTipoProduccion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdTipoProduccion($idTipoProduccion) {
        $this->idTipoProduccion = $idTipoProduccion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
