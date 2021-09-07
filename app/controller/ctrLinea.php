<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/Linea.php';
require_once '../interface/Ilinea.php';
require_once '../dao/daoLinea.php';

class ctrLinea {

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
    public static function getLineas() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoLinea();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Linea($datosForm->idLinea, $datosForm->descripcion,
                $datosForm->idArea, $datosForm->estado);
        $dao = new daoLinea();
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
        $dao = new daoLinea();
        $modelo = new Linea($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoLinea();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
