<?php

//Importar los recursos
require_once '../conexion/DataBase.php';
require_once '../model/Produccion.php';
require_once '../interface/Iproduccion.php';
require_once '../dao/daoProduccion.php';

class ctrProduccion {

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
    public static function getProducciones() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoProduccion();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listar();
    }


    public static function getReporteAutor() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoProduccion();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listarAutor();
    }



    public static function getReporteTipo() {
        //Instanciamos un objeto de tipp daoArea
        $Dao = new daoProduccion();
        //Invocamos al metodo listar 
        //retornando la informacion de las areas
        return $Dao->listarTipo();
    }

    public static function grabar() {
        $datosForm = self::validate();
        $modelo = new Produccion($datosForm->idProduccion, $datosForm->codigo, $datosForm->titulo, $datosForm->idAutor1, $datosForm->idAutor2, $datosForm->idAutor3, $datosForm->idAutor4, $datosForm->idAutor5, $datosForm->issn, $datosForm->fechaPublicacion, $datosForm->idRevista, $datosForm->idTipoProduccion, $datosForm->url, $datosForm->digital, $datosForm->fisico, $datosForm->idArea, $datosForm->idSublinea, $datosForm->observacion, $datosForm->estado);
        $dao = new daoProduccion();
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
        $dao = new daoProduccion();
        $modelo = new Produccion($datosForm->id, "", 0);
        if ($dao->delete($modelo)) {
            return '{"ok":true}';
        }
        return '{"error":"Ha ocurrido un Error Al Eliminar los Datos"}';
    }

    public static function editar() {
        $datosForm = (object) self::$array;
        $dao = new daoProduccion();
        $aJson = $dao->listarId($datosForm->id);
        return json_encode($aJson);
    }

}
