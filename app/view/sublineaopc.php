<?php
require '../controller/ctrSublinea.php';
$action = $_POST["action"];
$sublinea = new ctrSublinea($_POST);

switch ($action) {
    case "add":
        echo $sublinea->grabar();

        break;
    
    case "elim":
        echo $sublinea->eliminar();

        break;
    
    case "edit":
        echo $sublinea->editar();

        break;

    default:
        break;
}