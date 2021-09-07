<?php

class Personal {

    private $idPersonal;
    private $nombrespersonal;
    private $apellidospersonal;
    private $estado;

    function __construct($idPersonal = 0, $nombrespersonal = "", $apellidospersonal = "", $estado = 0) {
        $this->idPersonal = $idPersonal;
        $this->nombrespersonal = $nombrespersonal;
        $this->apellidospersonal = $apellidospersonal;
        $this->estado = $estado;
    }

    function getIdPersonal() {
        return $this->idPersonal;
    }

    function getNombrespersonal() {
        return $this->nombrespersonal;
    }

    function getApellidospersonal() {
        return $this->apellidospersonal;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdPersonal($idPersonal) {
        $this->idPersonal = $idPersonal;
    }

    function setNombrespersonal($nombrespersonal) {
        $this->nombrespersonal = $nombrespersonal;
    }

    function setApellidospersonal($apellidospersonal) {
        $this->apellidospersonal = $apellidospersonal;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
