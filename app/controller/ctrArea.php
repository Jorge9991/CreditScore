<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/Area.php';
require_once '../interface/Iarea.php';
require_once '../dao/daoArea.php';

class ctrArea {

//Defino un atributo estatico array
    private static $array;

    //Constructor del controlador que recibe un array
    //Con los datos de la vista (formulario)
    public function __construct($array = array()) {
        self::$array = $array;
    }

    //Validate, valida los datos que llegan del formulario
    //y los encapsula en un array
    public function opciones() {
        
    }

    public static function validate() {
        $datosForm = (object) self::$array;
        return$datosForm;
    }

    //Creamos un metodod que el controlador
    //Retorne las areas desde la bd
    public static function getAreas() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoArea();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Area($datosForm->idArea, $datosForm->descripcion, $datosForm->estado);
        $dao = new daoArea();
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
        $dao = new daoArea();
        $modelo = new Area($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoArea();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
