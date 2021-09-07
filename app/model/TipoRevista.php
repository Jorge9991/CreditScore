<?php

class TipoRevista {

    //Atributos
    private $idTipoRevista;
    private $descripcion;
    private $estado;

    //Constructor
    function __construct($idTipoRevista = 0, $descripcion = "", $estado = 0) {
        $this->idTipoRevista = $idTipoRevista;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    //Getter&Setter
    function getIdTipoRevista() {
        return $this->idTipoRevista;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdTipoRevista($idTipoRevista) {
        $this->idTipoRevista = $idTipoRevista;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
