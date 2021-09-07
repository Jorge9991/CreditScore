<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/Sublinea.php';
require_once '../interface/Isublinea.php';
require_once '../dao/daoSublinea.php';

class ctrSublinea {

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
    public static function getSublineas() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoSublinea();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Sublinea($datosForm->idSublinea, $datosForm->descripcion,
                $datosForm->idLinea, $datosForm->estado);
        $dao = new daoSublinea();
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
        $dao = new daoSublinea();
        $modelo = new Sublinea($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoSublinea();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
