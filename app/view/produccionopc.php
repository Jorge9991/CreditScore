<?php
require '../controller/ctrProduccion.php';
$action = $_POST["action"];
$produccion = new ctrProduccion($_POST);

switch ($action) {
    case "add":
        echo $produccion->grabar();

        break;
    
    case "elim":
        echo $produccion->eliminar();

        break;
    
    case "edit":
        echo $produccion->editar();

        break;

    default:
        break;
}
