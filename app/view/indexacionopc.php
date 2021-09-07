<?php
require '../controller/ctrIndexacion.php';
$action = $_POST["action"];
$indexacion = new ctrIndexacion($_POST);

switch ($action) {
    case "add":
        echo $indexacion->grabar();

        break;
    
    case "elim":
        echo $indexacion->eliminar();

        break;
    
    case "edit":
        echo $indexacion->editar();

        break;

    default:
        break;
}

