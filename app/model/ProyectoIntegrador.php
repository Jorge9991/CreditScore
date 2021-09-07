<?php

class ProyectoIntegrador {

    private $idProyectointegrador;
    private $nombre;
    private $fechaRegistro;
    private $fechaEvaluacion;
    private $idPeriodoLectivo;
    private $idCarrera;
    private $idNivel;
    private $idTutor;
    private $idjornada;
    private $idParalelo;
    PRIVATE $estado;
    private $idJurado1;
    private $idJurado2;
    private $idJurado3;
    PRIVATE $notaDocumental;
    PRIVATE $nota1Jurado1;
    PRIVATE $nota2Jurado1;
    PRIVATE $nota3Jurado1;
    PRIVATE $nota4Jurado1;
    PRIVATE $nota5Jurado1;
    PRIVATE $nota6Jurado1;
    PRIVATE $nota7Jurado1;
    PRIVATE $nota8Jurado1;
    PRIVATE $nota9Jurado1;
    PRIVATE $nota1Jurado2;
    PRIVATE $nota2Jurado2;
    PRIVATE $nota3Jurado2;
    PRIVATE $nota4Jurado2;
    PRIVATE $nota5Jurado2;
    PRIVATE $nota6Jurado2;
    PRIVATE $nota7Jurado2;
    PRIVATE $nota8Jurado2;
    PRIVATE $nota9Jurado2;
    PRIVATE $nota1Jurado3;
    PRIVATE $nota2Jurado3;
    PRIVATE $nota3Jurado3;
    PRIVATE $nota4Jurado3;
    PRIVATE $nota5Jurado3;
    PRIVATE $nota6Jurado3;
    PRIVATE $nota7Jurado3;
    PRIVATE $nota8Jurado3;
    PRIVATE $nota9Jurado3;

    function __construct($idProyectointegrador = 0, $nombre = "", $fechaRegistro = "", $fechaEvaluacion = "", $idPeriodoLectivo = 0, $idCarrera = 0, $idNivel = 0, $idTutor = 0, $idjornada = 0, $idParalelo = 0, $estado = 0, $idJurado1 = 0, $idJurado2 = 0, $idJurado3 = 0, $notaDocumental = 0, $nota1Jurado1 = 0, $nota2Jurado1 = 0, $nota3Jurado1 = 0, $nota4Jurado1 = 0, $nota5Jurado1 = 0, $nota6Jurado1 = 0, $nota7Jurado1 = 0, $nota8Jurado1 = 0, $nota9Jurado1 = 0, $nota1Jurado2 = 0, $nota2Jurado2 = 0, $nota3Jurado2 = 0, $nota4Jurado2 = 0, $nota5Jurado2 = 0, $nota6Jurado2 = 0, $nota7Jurado2 = 0, $nota8Jurado2 = 0, $nota9Jurado2 = 0, $nota1Jurado3 = 0, $nota2Jurado3 = 0, $nota3Jurado3 = 0, $nota4Jurado3 = 0, $nota5Jurado3 = 0, $nota6Jurado3 = 0, $nota7Jurado3 = 0, $nota8Jurado3 = 0, $nota9Jurado3 = 0) {
        $this->idProyectointegrador = $idProyectointegrador;
        $this->nombre = $nombre;
        $this->fechaRegistro = $fechaRegistro;
        $this->fechaEvaluacion = $fechaEvaluacion;
        $this->idPeriodoLectivo = $idPeriodoLectivo;
        $this->idCarrera = $idCarrera;
        $this->idNivel = $idNivel;
        $this->idTutor = $idTutor;
        $this->idjornada = $idjornada;
        $this->idParalelo = $idParalelo;
        $this->estado = $estado;
        $this->idJurado1 = $idJurado1;
        $this->idJurado2 = $idJurado2;
        $this->idJurado3 = $idJurado3;
        $this->notaDocumental = $notaDocumental;
        $this->nota1Jurado1 = $nota1Jurado1;
        $this->nota2Jurado1 = $nota2Jurado1;
        $this->nota3Jurado1 = $nota3Jurado1;
        $this->nota4Jurado1 = $nota4Jurado1;
        $this->nota5Jurado1 = $nota5Jurado1;
        $this->nota6Jurado1 = $nota6Jurado1;
        $this->nota7Jurado1 = $nota7Jurado1;
        $this->nota8Jurado1 = $nota8Jurado1;
        $this->nota9Jurado1 = $nota9Jurado1;
        $this->nota1Jurado2 = $nota1Jurado2;
        $this->nota2Jurado2 = $nota2Jurado2;
        $this->nota3Jurado2 = $nota3Jurado2;
        $this->nota4Jurado2 = $nota4Jurado2;
        $this->nota5Jurado2 = $nota5Jurado2;
        $this->nota6Jurado2 = $nota6Jurado2;
        $this->nota7Jurado2 = $nota7Jurado2;
        $this->nota8Jurado2 = $nota8Jurado2;
        $this->nota9Jurado2 = $nota9Jurado2;
        $this->nota1Jurado3 = $nota1Jurado3;
        $this->nota2Jurado3 = $nota2Jurado3;
        $this->nota3Jurado3 = $nota3Jurado3;
        $this->nota4Jurado3 = $nota4Jurado3;
        $this->nota5Jurado3 = $nota5Jurado3;
        $this->nota6Jurado3 = $nota6Jurado3;
        $this->nota7Jurado3 = $nota7Jurado3;
        $this->nota8Jurado3 = $nota8Jurado3;
        $this->nota9Jurado3 = $nota9Jurado3;
    }

    function getIdProyectointegrador() {
        return $this->idProyectointegrador;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getFechaEvaluacion() {
        return $this->fechaEvaluacion;
    }

    function getIdPeriodoLectivo() {
        return $this->idPeriodoLectivo;
    }

    function getIdCarrera() {
        return $this->idCarrera;
    }

    function getIdNivel() {
        return $this->idNivel;
    }

    function getIdTutor() {
        return $this->idTutor;
    }

    function getIdjornada() {
        return $this->idjornada;
    }

    function getIdParalelo() {
        return $this->idParalelo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getIdJurado1() {
        return $this->idJurado1;
    }

    function getIdJurado2() {
        return $this->idJurado2;
    }

    function getIdJurado3() {
        return $this->idJurado3;
    }

    function getNotaDocumental() {
        return $this->notaDocumental;
    }

    function getNota1Jurado1() {
        return $this->nota1Jurado1;
    }

    function getNota2Jurado1() {
        return $this->nota2Jurado1;
    }

    function getNota3Jurado1() {
        return $this->nota3Jurado1;
    }

    function getNota4Jurado1() {
        return $this->nota4Jurado1;
    }

    function getNota5Jurado1() {
        return $this->nota5Jurado1;
    }

    function getNota6Jurado1() {
        return $this->nota6Jurado1;
    }

    function getNota7Jurado1() {
        return $this->nota7Jurado1;
    }

    function getNota8Jurado1() {
        return $this->nota8Jurado1;
    }

    function getNota9Jurado1() {
        return $this->nota9Jurado1;
    }

    function getNota1Jurado2() {
        return $this->nota1Jurado2;
    }

    function getNota2Jurado2() {
        return $this->nota2Jurado2;
    }

    function getNota3Jurado2() {
        return $this->nota3Jurado2;
    }

    function getNota4Jurado2() {
        return $this->nota4Jurado2;
    }

    function getNota5Jurado2() {
        return $this->nota5Jurado2;
    }

    function getNota6Jurado2() {
        return $this->nota6Jurado2;
    }

    function getNota7Jurado2() {
        return $this->nota7Jurado2;
    }

    function getNota8Jurado2() {
        return $this->nota8Jurado2;
    }

    function getNota9Jurado2() {
        return $this->nota9Jurado2;
    }

    function getNota1Jurado3() {
        return $this->nota1Jurado3;
    }

    function getNota2Jurado3() {
        return $this->nota2Jurado3;
    }

    function getNota3Jurado3() {
        return $this->nota3Jurado3;
    }

    function getNota4Jurado3() {
        return $this->nota4Jurado3;
    }

    function getNota5Jurado3() {
        return $this->nota5Jurado3;
    }

    function getNota6Jurado3() {
        return $this->nota6Jurado3;
    }

    function getNota7Jurado3() {
        return $this->nota7Jurado3;
    }

    function getNota8Jurado3() {
        return $this->nota8Jurado3;
    }

    function getNota9Jurado3() {
        return $this->nota9Jurado3;
    }

    function setIdProyectointegrador($idProyectointegrador) {
        $this->idProyectointegrador = $idProyectointegrador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setFechaEvaluacion($fechaEvaluacion) {
        $this->fechaEvaluacion = $fechaEvaluacion;
    }

    function setIdPeriodoLectivo($idPeriodoLectivo) {
        $this->idPeriodoLectivo = $idPeriodoLectivo;
    }

    function setIdCarrera($idCarrera) {
        $this->idCarrera = $idCarrera;
    }

    function setIdNivel($idNivel) {
        $this->idNivel = $idNivel;
    }

    function setIdTutor($idTutor) {
        $this->idTutor = $idTutor;
    }

    function setIdjornada($idjornada) {
        $this->idjornada = $idjornada;
    }

    function setIdParalelo($idParalelo) {
        $this->idParalelo = $idParalelo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setIdJurado1($idJurado1) {
        $this->idJurado1 = $idJurado1;
    }

    function setIdJurado2($idJurado2) {
        $this->idJurado2 = $idJurado2;
    }

    function setIdJurado3($idJurado3) {
        $this->idJurado3 = $idJurado3;
    }

    function setNotaDocumental($notaDocumental) {
        $this->notaDocumental = $notaDocumental;
    }

    function setNota1Jurado1($nota1Jurado1) {
        $this->nota1Jurado1 = $nota1Jurado1;
    }

    function setNota2Jurado1($nota2Jurado1) {
        $this->nota2Jurado1 = $nota2Jurado1;
    }

    function setNota3Jurado1($nota3Jurado1) {
        $this->nota3Jurado1 = $nota3Jurado1;
    }

    function setNota4Jurado1($nota4Jurado1) {
        $this->nota4Jurado1 = $nota4Jurado1;
    }

    function setNota5Jurado1($nota5Jurado1) {
        $this->nota5Jurado1 = $nota5Jurado1;
    }

    function setNota6Jurado1($nota6Jurado1) {
        $this->nota6Jurado1 = $nota6Jurado1;
    }

    function setNota7Jurado1($nota7Jurado1) {
        $this->nota7Jurado1 = $nota7Jurado1;
    }

    function setNota8Jurado1($nota8Jurado1) {
        $this->nota8Jurado1 = $nota8Jurado1;
    }

    function setNota9Jurado1($nota9Jurado1) {
        $this->nota9Jurado1 = $nota9Jurado1;
    }

    function setNota1Jurado2($nota1Jurado2) {
        $this->nota1Jurado2 = $nota1Jurado2;
    }

    function setNota2Jurado2($nota2Jurado2) {
        $this->nota2Jurado2 = $nota2Jurado2;
    }

    function setNota3Jurado2($nota3Jurado2) {
        $this->nota3Jurado2 = $nota3Jurado2;
    }

    function setNota4Jurado2($nota4Jurado2) {
        $this->nota4Jurado2 = $nota4Jurado2;
    }

    function setNota5Jurado2($nota5Jurado2) {
        $this->nota5Jurado2 = $nota5Jurado2;
    }

    function setNota6Jurado2($nota6Jurado2) {
        $this->nota6Jurado2 = $nota6Jurado2;
    }

    function setNota7Jurado2($nota7Jurado2) {
        $this->nota7Jurado2 = $nota7Jurado2;
    }

    function setNota8Jurado2($nota8Jurado2) {
        $this->nota8Jurado2 = $nota8Jurado2;
    }

    function setNota9Jurado2($nota9Jurado2) {
        $this->nota9Jurado2 = $nota9Jurado2;
    }

    function setNota1Jurado3($nota1Jurado3) {
        $this->nota1Jurado3 = $nota1Jurado3;
    }

    function setNota2Jurado3($nota2Jurado3) {
        $this->nota2Jurado3 = $nota2Jurado3;
    }

    function setNota3Jurado3($nota3Jurado3) {
        $this->nota3Jurado3 = $nota3Jurado3;
    }

    function setNota4Jurado3($nota4Jurado3) {
        $this->nota4Jurado3 = $nota4Jurado3;
    }

    function setNota5Jurado3($nota5Jurado3) {
        $this->nota5Jurado3 = $nota5Jurado3;
    }

    function setNota6Jurado3($nota6Jurado3) {
        $this->nota6Jurado3 = $nota6Jurado3;
    }

    function setNota7Jurado3($nota7Jurado3) {
        $this->nota7Jurado3 = $nota7Jurado3;
    }

    function setNota8Jurado3($nota8Jurado3) {
        $this->nota8Jurado3 = $nota8Jurado3;
    }

    function setNota9Jurado3($nota9Jurado3) {
        $this->nota9Jurado3 = $nota9Jurado3;
    }

}
