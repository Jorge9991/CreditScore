<?php

class daoTipoRevista implements Itiporevista {

    //put your code here
    public function crear(\TipoRevista $object) {
        try {
            $sql = 'insert into inv_tipo_revista (descripcion,estado) values (:descripcion,:estado)';
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

    public function delete(\TipoRevista $object) {
        try {
            $sql = 'UPDATE inv_tipo_revista SET estado=:estado WHERE id_tipo_revista = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->bindParam(':id', $object->getIdTipoRevista(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\TipoRevista $object) {
        try {
            $sql = 'UPDATE inv_tipo_revista SET descripcion=:descripcion, estado=:estado WHERE id_tipo_revista = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdTipoRevista(), PDO::PARAM_INT);
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
        $tiporevistas = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT r.id_tipo_revista AS id, r.descripcion FROM inv_tipo_revista r
WHERE r.estado=1 group by r.id_tipo_revista  order by r.id_tipo_revista asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tiporevistas[] = new TipoRevista($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tiporevistas;
    }

    public function listarId($id) {
        $tiporevista = null;
        try {
            $sql = 'SELECT * from inv_tipo_revista WHERE id_tipo_revista = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tiporevista = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tiporevista;
    }

}
