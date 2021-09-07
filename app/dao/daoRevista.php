<?php

class daoRevista implements Irevista {

    public function crear(\Revista $object) {
        try {
            $sql = 'insert into inv_revista (nombre,procedencia,id_indexado,id_tipo_revista,estado) VALUES (:nombre,:procedencia,:idIndexacion,:idTipoRevista,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':nombre', $object->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':procedencia', $object->getProcedencia(), PDO::PARAM_STR);
            $stmp->bindParam(':idIndexacion', $object->getIdIndexacion(), PDO::PARAM_INT);
            $stmp->bindParam(':idTipoRevista', $object->getIdTipoRevista(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\Revista $object) {
        try {
            $sql = 'UPDATE inv_revista SET estado=0 WHERE id_revista = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdRevista(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Revista $object) {
        try {
            $sql = 'UPDATE inv_revista SET nombre=:nombre,procedencia=:procedencia,id_indexado=:idIndexado,id_tipo_revista=:idTipoRevista,estado=:estado WHERE id_revista = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdRevista(), PDO::PARAM_INT);
            $stmp->bindParam(':nombre', $object->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':procedencia', $object->getProcedencia(), PDO::PARAM_STR);
            $stmp->bindParam(':idIndexado', $object->getIdIndexacion(), PDO::PARAM_INT);
            $stmp->bindParam(':idTipoRevista', $object->getIdTipoRevista(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() >= 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar() {
        //Array 
        $revistas = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'select u.id_revista,u.nombre,u.procedencia,t.descripcion id_indexacion,k.descripcion id_tipo_revista,u.estado
            from inv_revista u,inv_indexacion t,inv_tipo_revista k  
            where u.id_tipo_revista=k.id_tipo_revista 
            AND u.id_indexado = t.id_indexacion 
            and u.estado = 1
            GROUP BY u.id_revista order by u.id_revista asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $revistas[] = new Revista($obj->id_revista, $obj->nombre, $obj->procedencia, $obj->id_indexacion, $obj->id_tipo_revista, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $revistas;
    }

    public function listarId($id) {
        $revista = null;
        try {
            $sql = 'SELECT * from inv_revista WHERE id_revista = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $revista = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $revista;
    }

}
