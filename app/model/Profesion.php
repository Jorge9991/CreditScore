<?php

class Profesion {

    //Atributos
    private $idProfesion;
    private $descripcion;
    private $estado;

    //Constructor
    function __construct($idProfesion = 0, $descripcion = "", $estado = 0) {
        $this->idProfesion = $idProfesion;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    //Getter&Setter
    function getIdProfesion() {
        return $this->idProfesion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdProfesion($idProfesion) {
        $this->idProfesion = $idProfesion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
