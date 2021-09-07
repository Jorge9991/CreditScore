<?php
require '../controller/ctrTipoRevista.php';
$action = $_POST["action"];
$tiporevista = new ctrTipoRevista($_POST);

switch ($action) {
    case "add":
        echo $tiporevista->grabar();

        break;
    
    case "elim":
        echo $tiporevista->eliminar();

        break;
    
    case "edit":
        echo $tiporevista->editar();

        break;

    default:
        break;
}
