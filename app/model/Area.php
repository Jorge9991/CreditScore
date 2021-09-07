<?php

class Area {

    //Atributos
    private $idArea;
    private $descripcion;
    private $estado;

//Constructor
    function __construct($idArea = 0, $descripcion = "", $estado = 0) {
        $this->idArea = $idArea;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

//Metodos Getter&Setter
    function getIdArea() {
        return $this->idArea;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdArea($idArea) {
        $this->idArea = $idArea;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
