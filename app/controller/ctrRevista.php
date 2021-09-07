<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/Revista.php';
require_once '../interface/Irevista.php';
require_once '../dao/daoRevista.php';

class ctrRevista {

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
    public static function getRevistas() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoRevista();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Revista($datosForm->idRevista, $datosForm->nombre, $datosForm->procedencia, $datosForm->idIndexacion,
                $datosForm->idTipoRevista, $datosForm->estado);
        $dao = new daoRevista();
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
        $dao = new daoRevista();
        $modelo = new Revista($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoRevista();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
