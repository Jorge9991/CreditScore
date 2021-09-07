<?php

require_once '../conexion/DataBase.php';
require_once '../model/Personal.php';
require_once '../interface/Ipersonal.php';
require_once '../dao/daoPersonal.php';

class ctrPersonal {

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
    public static function getPersonales() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoPersonal();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

}
