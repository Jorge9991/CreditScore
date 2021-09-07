<?php
require '../controller/ctrProfesion.php';
$action = $_POST["action"];
$profesion = new ctrProfesion($_POST);

switch ($action) {
    case "add":
        echo $profesion->grabar();

        break;
    
    case "elim":
        echo $profesion->eliminar();

        break;
    
    case "edit":
        echo $profesion->editar();

        break;

    default:
        break;
}

