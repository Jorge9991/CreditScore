<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/TipoProduccion.php';
require_once '../interface/Itipoproduccion.php';
require_once '../dao/daoTipoProduccion.php';

class ctrTipoProduccion {

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

    public function opciones() {
        
    }

    //Creamos un metodod que el controlador
    //Retorne las areas desde la bd
    public static function getTipoProducciones() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoTipoProduccion();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new TipoProduccion($datosForm->idTipoProduccion, $datosForm->descripcion, $datosForm->estado);
        $dao = new daoTipoProduccion();
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
        $dao = new daoTipoProduccion();
        $modelo = new TipoProduccion($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoTipoProduccion();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
