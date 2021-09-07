<?php

require_once '../conexion/DataBase.php';
date_default_timezone_set("America/Guayaquil");

class daoTipoUsuarioReporte {

    public function listarTodo() {
        try {
            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,'
                    . 't.descripcion idTipoUsuario,u.estado from inv_usuario u,inv_tipousuario t '
                    . 'where u.idTipoUsuario=t.idTipoUsuario and u.estado=1 group by u.idUsuario  order by u.idUsuario asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function buscarTipoUsuario($tipo) {
        try {

            $sql = 'select u.idUsuario,u.cedula,u.nombre,u.apellido,u.direccion,u.telefono,u.correo,u.usuario,t.descripcion idTipoUsuario,u.estado 
from inv_usuario u,inv_tipousuario t 
where u.idTipoUsuario=t.idTipoUsuario and u.estado=1 and u.idTipoUsuario = "'.$tipo.'"
group by u.idUsuario  order by u.idUsuario asc ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    

}

?>