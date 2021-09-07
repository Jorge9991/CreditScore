<?php

class Produccion {

    private $idProduccion;
    private $codigo;
    private $titulo;
    private $idAutor1;
    private $idAutor2;
    private $idAutor3;
    private $idAutor4;
    private $idAutor5;
    private $issn;
    private $fechaPublicacion;
    private $idRevista;
    private $idTipoProduccion;
    private $url;
    private $digital;
    private $fisico;
    private $idArea;
    private $idSublinea;
    private $observacion;
    private $estado;

    //Constructor
    function __construct($idProduccion = 0, $codigo = "", $titulo = "", $idAutor1 = 0, $idAutor2 = 0, $idAutor3 = 0, $idAutor4 = 0, $idAutor5 = 0, $issn = "", $fechaPublicacion = "", $idRevista = 0, $idTipoProduccion = 0, $url = "", $digital = 0, $fisico = 0, $idArea = 0, $idSublinea = 0, $observacion = "", $estado = 0) {
        $this->idProduccion = $idProduccion;
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->idAutor1 = $idAutor1;
        $this->idAutor2 = $idAutor2;
        $this->idAutor3 = $idAutor3;
        $this->idAutor4 = $idAutor4;
        $this->idAutor5 = $idAutor5;
        $this->issn = $issn;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->idRevista = $idRevista;
        $this->idTipoProduccion = $idTipoProduccion;
        $this->url = $url;
        $this->digital = $digital;
        $this->fisico = $fisico;
        $this->idArea = $idArea;
        $this->idSublinea = $idSublinea;
        $this->observacion = $observacion;
        $this->estado = $estado;
    }

    function getIdProduccion() {
        return $this->idProduccion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getIdAutor1() {
        return $this->idAutor1;
    }

    function getIdAutor2() {
        return $this->idAutor2;
    }

    function getIdAutor3() {
        return $this->idAutor3;
    }

    function getIdAutor4() {
        return $this->idAutor4;
    }

    function getIdAutor5() {
        return $this->idAutor5;
    }

    function getIssn() {
        return $this->issn;
    }

    function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }

    function getIdRevista() {
        return $this->idRevista;
    }

    function getIdTipoProduccion() {
        return $this->idTipoProduccion;
    }

    function getUrl() {
        return $this->url;
    }

    function getDigital() {
        return $this->digital;
    }

    function getFisico() {
        return $this->fisico;
    }

    function getIdArea() {
        return $this->idArea;
    }

    function getIdSublinea() {
        return $this->idSublinea;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdProduccion($idProduccion) {
        $this->idProduccion = $idProduccion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setIdAutor1($idAutor1) {
        $this->idAutor1 = $idAutor1;
    }

    function setIdAutor2($idAutor2) {
        $this->idAutor2 = $idAutor2;
    }

    function setIdAutor3($idAutor3) {
        $this->idAutor3 = $idAutor3;
    }

    function setIdAutor4($idAutor4) {
        $this->idAutor4 = $idAutor4;
    }

    function setIdAutor5($idAutor5) {
        $this->idAutor5 = $idAutor5;
    }

    function setIssn($issn) {
        $this->issn = $issn;
    }

    function setFechaPublicacion($fechaPublicacion) {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    function setIdRevista($idRevista) {
        $this->idRevista = $idRevista;
    }

    function setIdTipoProduccion($idTipoProduccion) {
        $this->idTipoProduccion = $idTipoProduccion;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setDigital($digital) {
        $this->digital = $digital;
    }

    function setFisico($fisico) {
        $this->fisico = $fisico;
    }

    function setIdArea($idArea) {
        $this->idArea = $idArea;
    }

    function setIdSublinea($idSublinea) {
        $this->idSublinea = $idSublinea;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
