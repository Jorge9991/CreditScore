<?php
require '../controller/ctrProyectoIntegrador.php';
$action = $_POST["action"];
$proyecto = new ctrProyectoIntegrador($_POST);

switch ($action) {
    case "add":
        echo $proyecto->grabar();

        break;
    
    case "elim":
        echo $proyecto->eliminar();

        break;
    
    case "edit":
        echo $proyecto->editar();

        break;

    default:
        break;
}
