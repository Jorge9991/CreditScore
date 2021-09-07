<?php

class Linea {

    private $idLinea;
    private $descripcion;
    private $idArea;
    private $estado;

    function __construct($idLinea = 0, $descripcion = "", $idArea = 0, $estado = 0) {
        $this->idLinea = $idLinea;
        $this->descripcion = $descripcion;
        $this->idArea = $idArea;
        $this->estado = $estado;
    }

    function getIdLinea() {
        return $this->idLinea;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdArea() {
        return $this->idArea;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdLinea($idLinea) {
        $this->idLinea = $idLinea;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdArea($idArea) {
        $this->idArea = $idArea;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
