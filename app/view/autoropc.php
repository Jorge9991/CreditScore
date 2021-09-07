<?php
require '../controller/ctrAutor.php';
$action = $_POST["action"];
$autor= new ctrAutor($_POST);

switch ($action) {
    case "add":
        echo $autor->grabar();

        break;
    
    case "elim":
        echo $autor->eliminar();

        break;
    
    case "edit":
        echo $autor->editar();

        break;

    default:
        break;
}
