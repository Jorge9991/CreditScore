<?php

require_once '../conexion/DataBase.php';
require_once '../model/Paralelo.php';
require_once '../interface/Iparalelo.php';
require_once '../dao/daoParalelo.php';

class ctrParalelo {

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
    public static function getParalelos() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoParalelo();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

}
