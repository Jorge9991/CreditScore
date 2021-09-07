<?php
require '../controller/ctrTipoProduccion.php';
$action = $_POST["action"];
$tipoproduccion = new ctrTipoProduccion($_POST);

switch ($action) {
    case "add":
        echo $tipoproduccion->grabar();

        break;
    
    case "elim":
        echo $tipoproduccion->eliminar();

        break;
    
    case "edit":
        echo $tipoproduccion->editar();

        break;

    default:
        break;
}

