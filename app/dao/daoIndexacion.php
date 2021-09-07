<?php

class daoIndexacion implements Iindexacion {

    public function crear(\Indexacion $object) {
        try {
            $sql = 'insert into inv_indexacion (descripcion,estado) values (:descripcion,:estado)';
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

    public function delete(\Indexacion $object) {
        try {
            $sql = 'UPDATE inv_indexacion SET estado=:estado WHERE id_indexacion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->bindParam(':id', $object->getIdIndexacion(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Indexacion $object) {
        try {
            $sql = 'UPDATE inv_indexacion SET descripcion=:descripcion, estado=:estado WHERE id_indexacion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdIndexacion(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
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
        $indexaciones = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT i.id_indexacion AS id, i.descripcion FROM inv_indexacion i
WHERE i.estado=1  group by i.id_indexacion  order by i.id_indexacion asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $indexaciones[] = new Indexacion($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $indexaciones;
    }

    public function listarId($id) {
        $area = null;
        try {
            $sql = 'SELECT * from inv_indexacion WHERE id_indexacion = :id';
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
