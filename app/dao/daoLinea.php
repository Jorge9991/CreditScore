<?php

class daoLinea implements Ilinea {

    public function crear(\Linea $object) {
        try {
            $sql = 'insert into inv_linea (descripcion,id_area,estado) values (:descripcion,:idArea,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':idArea', $object->getIdArea(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function delete(\Linea $object) {
        try {
            $sql = 'UPDATE inv_linea SET estado=0 WHERE id_linea = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdLinea(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Linea $object) {
        try {
            $sql = 'UPDATE inv_linea SET descripcion=:descripcion,id_area=:idArea,estado=:estado WHERE id_linea = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdLinea(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion', $object->getDescripcion(), PDO::PARAM_STR);
            $stmp->bindParam(':idArea', $object->getIdArea(), PDO::PARAM_INT);
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
        $lineas = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'select u.id_linea,u.descripcion,t.descripcion id_area,u.estado from inv_linea u,inv_area t where u.id_area=t.id_area and u.estado=1 
                   group by u.id_linea  order by u.id_linea asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $lineas[] = new Linea($obj->id_linea, $obj->descripcion, $obj->id_area, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $lineas;
    }

    public function listarId($id) {
        $linea = null;
        try {
            $sql = 'SELECT * from inv_linea WHERE id_linea = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $linea = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $linea;
    }

}
