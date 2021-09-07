<?php

require_once '../conexion/DataBase.php';
require_once '../model/ProyectoIntegrador.php';
require_once '../interface/Iproyectointegrador.php';
require_once '../dao/daoProyectoIntegrador.php';

class ctrProyectoIntegrador {

    //Defino un atributo estatico array
    private static $array;

    //Constructor del controlador que recibe un array
    //Con los datos de la vista (formulario)
    public function __construct($array = array()) {
        self::$array = $array;
    }

    //Validate, valida los datos que llegan del formulario
    //y los encapsula en un array

    public static function validate() {
        $datosForm = (object) self::$array;
        return$datosForm;
    }

    //Creamos un metodod que el controlador
    //Retorne las areas desde la bd
    public static function getProyectos() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoProyectoIntegrador();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new ProyectoIntegrador();
        $modelo->setIdProyectointegrador($datosForm->idProyectointegrador);
        $modelo->setNombre($datosForm->nombre);
        $modelo->setIdPeriodoLectivo($datosForm->idPeriodoLectivo);
        $modelo->setIdCarrera($datosForm->idCarrera);
        $modelo->setIdNivel($datosForm->idNivel);
        $modelo->setIdTutor($datosForm->idTutor);
        $modelo->setIdjornada($datosForm->idjornada);
        $modelo->setIdParalelo($datosForm->idParalelo);
        $modelo->setEstado($datosForm->estado);
        $dao = new daoProyectoIntegrador();
        switch ($datosForm->opc) {
            case 'I': if ($dao->crear($modelo))
                    return '{"ok":true}';
            default : if ($dao->editar($modelo))
                    return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error al Grabar El Registro"}';
    }

    public static function eliminar() {
        $datosForm = self::validate();
        $dao = new daoProyectoIntegrador();
        $modelo = new ProyectoIntegrador($datosForm->id, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoProyectoIntegrador();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
