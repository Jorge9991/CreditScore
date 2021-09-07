<?php

class Revista {

    private $idRevista;
    private $nombre;
    private $procedencia;
    private $idIndexacion;
    private $idTipoRevista;
    private $estado;

    function __construct($idRevista = 0, $nombre = "", $procedencia = "", $idIndexacion = 0, $idTipoRevista = 0, $estado = 0) {
        $this->idRevista = $idRevista;
        $this->nombre = $nombre;
        $this->procedencia = $procedencia;
        $this->idIndexacion = $idIndexacion;
        $this->idTipoRevista = $idTipoRevista;
        $this->estado = $estado;
    }

    function getIdRevista() {
        return $this->idRevista;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getProcedencia() {
        return $this->procedencia;
    }

    function getIdIndexacion() {
        return $this->idIndexacion;
    }

    function getIdTipoRevista() {
        return $this->idTipoRevista;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdRevista($idRevista) {
        $this->idRevista = $idRevista;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setProcedencia($procedencia) {
        $this->procedencia = $procedencia;
    }

    function setIdIndexacion($idIndexacion) {
        $this->idIndexacion = $idIndexacion;
    }

    function setIdTipoRevista($idTipoRevista) {
        $this->idTipoRevista = $idTipoRevista;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
