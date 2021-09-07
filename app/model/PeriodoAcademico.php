<?php

class PeriodoAcademico {

    //Atributos
    private $id;
    private $descripcion;
    private $estado;

    //Constructor
    function __construct($id, $descripcion, $estado) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    //Getter Setter
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
