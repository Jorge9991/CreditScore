<?php
require '../controller/ctrRevista.php';
$action = $_POST["action"];
$revista = new ctrRevista($_POST);

switch ($action) {
    case "add":
        echo $revista->grabar();

        break;
    
    case "elim":
        echo $revista->eliminar();

        break;
    
    case "edit":
        echo $revista->editar();

        break;

    default:
        break;
}
