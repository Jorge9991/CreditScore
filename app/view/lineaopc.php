<?php
require '../controller/ctrLinea.php';
$action = $_POST["action"];
$linea = new ctrLinea($_POST);

switch ($action) {
    case "add":
        echo $linea->grabar();

        break;
    
    case "elim":
        echo $linea->eliminar();

        break;
    
    case "edit":
        echo $linea->editar();

        break;

    default:
        break;
}
