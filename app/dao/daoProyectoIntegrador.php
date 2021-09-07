<?php

class daoProyectoIntegrador implements Iproyectointegrador {

    public function crear(\ProyectoIntegrador $proyectointegrador) {
        try {

            $sql = ' INSERT INTO inv_proyecto_integrador (nombre, fecha_registro, id_periodo,id_carrera,id_nivel,id_tutor, id_jornada, id_paralelo, estado) 
                    VALUES (:nombre,NOW(), :id_periodo, :id_carrera,:id_nivel,:id_tutor, :id_jornada, :id_paralelo, :estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':nombre', $proyectointegrador->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':id_periodo', $proyectointegrador->getIdPeriodoLectivo(), PDO::PARAM_INT);
            $stmp->bindParam(':id_carrera', $proyectointegrador->getIdCarrera(), PDO::PARAM_INT);
            $stmp->bindParam(':id_nivel', $proyectointegrador->getIdNivel(), PDO::PARAM_INT);
            $stmp->bindParam(':id_tutor', $proyectointegrador->getIdTutor(), PDO::PARAM_INT);
            $stmp->bindParam(':id_jornada', $proyectointegrador->getIdjornada(), PDO::PARAM_INT);
            $stmp->bindParam(':id_paralelo', $proyectointegrador->getIdParalelo(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $proyectointegrador->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\ProyectoIntegrador $proyectointegrador) {
        try {
            $sql = 'UPDATE inv_proyecto_integrador SET estado=0 WHERE id_proyecto = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $proyectointegrador->getIdProyectointegrador(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\ProyectoIntegrador $proyectointegrador) {
        try {
            $sql = 'UPDATE inv_proyecto_integrador SET nombre=:nombre,id_periodo=:id_periodo,id_carrera=:id_carrera,id_nivel=:id_nivel,id_tutor=:id_tutor, id_jornada=:id_jornada,id_paralelo=:id_paralelo,estado=:estado WHERE id_proyecto=:id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $proyectointegrador->getIdProyectointegrador(), PDO::PARAM_INT);
            $stmp->bindParam(':nombre', $proyectointegrador->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':id_periodo', $proyectointegrador->getIdPeriodoLectivo(), PDO::PARAM_INT);
            $stmp->bindParam(':id_carrera', $proyectointegrador->getIdCarrera(), PDO::PARAM_INT);
            $stmp->bindParam(':id_nivel', $proyectointegrador->getIdNivel(), PDO::PARAM_INT);
            $stmp->bindParam(':id_tutor', $proyectointegrador->getIdTutor(), PDO::PARAM_INT);
            $stmp->bindParam(':id_jornada', $proyectointegrador->getIdjornada(), PDO::PARAM_INT);
            $stmp->bindParam(':id_paralelo', $proyectointegrador->getIdParalelo(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $proyectointegrador->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() >= 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar() {
        $proyectos = array();
        try {
            $sql = 'select pi.id_proyecto as id, pi.nombre, pl.DescripPeriodoLect, c.nombrecarrera, pa.nombreperiodoacademico, concat(per.nombrespersonal," ",per.apellidospersonal) as tutor,jor.descripcion as jornada, par.descripparalelo as paralelo
from inv_proyecto_integrador pi inner join periodolectivo pl on pi.id_periodo = pl.idPeriodolectivo inner join carrera c on pi.id_carrera = c.idcarrera inner join inv_jornada jor on pi.id_jornada = jor.id_jornada
inner join periodoacademico pa on pi.id_nivel = pa.idperiodoacademico inner join personal per on pi.id_tutor = per.idpersonal inner join paralelo par on pi.id_paralelo = par.idparalelo where pi.estado = 1 group by pi.id_proyecto';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $proyectos[] = new ProyectoIntegrador($obj->id, $obj->nombre, "", "", $obj->DescripPeriodoLect, $obj->nombrecarrera, $obj->nombreperiodoacademico, $obj->tutor, $obj->jornada, $obj->paralelo, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $proyectos;
    }

    public function listarId($id) {
        $proyecto = null;
        try {
            $sql = 'SELECT * from inv_proyecto_integrador WHERE id_proyecto = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $proyecto = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $proyecto;
    }

    public function evaluar(\ProyectoIntegrador $proyectointegrador) {
        
    }

}
