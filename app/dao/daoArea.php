<?php

class daoArea implements Iarea {

    public function crear(\Area $object) {
        try {
            $sql = 'insert into inv_area (descripcion,estado) values (:descripcion,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\Area $object) {
        try {
            $sql = 'UPDATE inv_area SET estado=:estado WHERE id_area = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->bindParam(':id', $object->getIdArea(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Area $object) {
        try {
            $sql = 'UPDATE inv_area SET descripcion=:descripcion, estado=:estado WHERE id_area = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdArea(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() >= 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

//Metodo que consulta los registros de la base de datos
    public function listar() {
        //Array
        $areas = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT a.id_area as id, a.descripcion  FROM inv_area a
WHERE a.estado=1 group by a.id_area  order by a.id_area asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $areas[] = new Area($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $areas;
    }

    public function listarId($id) {
        $area = null;
        try {
            $sql = 'SELECT * from inv_area WHERE id_area = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $area = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $area;
    }

}
