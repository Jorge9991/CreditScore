<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/Jornada.php';
require_once '../interface/Ijornada.php';
require_once '../dao/daoJornada.php';

class ctrJornada {

    private static $array;

    //Constructor del controlador que recibe un array 
    //Con los datos de la vista (formulario)
    public function __construct($array = array()) {
        self::$array = $array;
    }

    //Validate, valida los datos que llegan del formulario
    //Y los encapsula en un array
    public static function validate() {
        $datosForm = (object) self::$array;
        return $datosForm;
    }

    //Creamos un metodo que el controlador
    //Retorne las carreras desde la bd
    public static function getJornadas() {
        //Instanciamos un objeto de 
        //tipo daoCarrera
        $Dao = new daoJornada();
        //Invocamos al metódo listar
        //Retornando la información
        //De las carreras
        return $Dao->listar();
    }

}
