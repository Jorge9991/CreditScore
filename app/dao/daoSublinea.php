<?php

class daoSublinea implements Isublinea {

    public function crear(\Sublinea $object) {
        try {
            $sql = 'insert into inv_sublinea (descripcion,id_linea,estado) values (:descripcion,:idLinea,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':idLinea', $object->getIdLinea(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function delete(\Sublinea $object) {
        try {
            $sql = 'UPDATE inv_sublinea SET estado=0 WHERE id_sublinea = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdSublinea(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Sublinea $object) {
        try {
            $sql = 'UPDATE inv_sublinea SET descripcion=:descripcion,id_linea=:idLinea,estado=:estado WHERE id_sublinea = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdSublinea(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':idLinea', $object->getIdLinea(), PDO::PARAM_INT);
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
        $sublineas = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'select u.id_sublinea,u.descripcion,t.descripcion id_linea,u.estado from inv_sublinea u,inv_linea t where u.id_linea=t.id_linea and u.estado=1 group by u.id_sublinea  order by u.id_sublinea asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $sublineas[] = new Sublinea($obj->id_sublinea, $obj->descripcion, $obj->id_linea, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $sublineas;
    }

    public function listarId($id) {
        $sublinea = null;
        try {
            $sql = 'SELECT * from inv_sublinea WHERE id_sublinea = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $sublinea = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $sublinea;
    }

}
