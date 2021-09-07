<?php

class Autor {

    private $idAutor;
    private $cedula;
    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $idProfesion;
    private $estado;

    function __construct($idAutor = 0, $cedula = "", $nombre = "", $apellido = "", $telefono = "", $correo = "", $idProfesion = 0, $estado = 0) {
        $this->idAutor = $idAutor;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->idProfesion = $idProfesion;
        $this->estado = $estado;
    }

    function getIdAutor() {
        return $this->idAutor;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getIdProfesion() {
        return $this->idProfesion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdAutor($idAutor) {
        $this->idAutor = $idAutor;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setIdProfesion($idProfesion) {
        $this->idProfesion = $idProfesion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
