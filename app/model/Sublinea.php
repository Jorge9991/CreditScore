<?php

class Sublinea {

    private $idSublinea;
    private $descripcion;
    private $idLinea;
    private $estado;

    function __construct($idSublinea = 0, $descripcion = "", $idLinea = 0, $estado = 0) {
        $this->idSublinea = $idSublinea;
        $this->descripcion = $descripcion;
        $this->idLinea = $idLinea;
        $this->estado = $estado;
    }

    function getIdSublinea() {
        return $this->idSublinea;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdLinea() {
        return $this->idLinea;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdSublinea($idSublinea) {
        $this->idSublinea = $idSublinea;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdLinea($idLinea) {
        $this->idLinea = $idLinea;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
