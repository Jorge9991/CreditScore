<?php
require '../controller/ctrArea.php';
$action = $_POST["action"];
$area = new ctrArea($_POST);

switch ($action) {
    case "add":
        echo $area->grabar();

        break;
    
    case "elim":
        echo $area->eliminar();

        break;
    
    case "edit":
        echo $area->editar();

        break;

    default:
        break;
}
