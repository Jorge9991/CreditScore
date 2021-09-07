<?php

require_once '../conexion/DataBase.php';
require_once '../model/Profesion.php';
require_once '../interface/Iprofesion.php';
require_once '../dao/daoProfesion.php';

class ctrProfesion {

    //Defino un atributo estatico array
    private static $array;

    //Constructor del controlador que recibe un array
    //Con los datos de la vista (formulario)
    public function __construct($array = array()) {
        self::$array = $array;
    }

    public function opciones() {
        
    }

    //Validate, valida los datos que llegan del formulario
    //y los encapsula en un array
    public static function validate() {
        $datosForm = (object) self::$array;
        return$datosForm;
    }

    //Creamos un metodod que el controlador
    //Retorne las areas desde la bd
    public static function getProfesiones() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoProfesion();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Profesion($datosForm->idProfesion, $datosForm->descripcion, $datosForm->estado);
        $dao = new daoProfesion();
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
        $dao = new daoProfesion();
        $modelo = new Profesion($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoProfesion();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
