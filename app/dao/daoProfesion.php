<?php

class daoProfesion implements Iprofesion {

    //put your code here
    public function crear(\Profesion $object) {
        try {
            $sql = 'insert into inv_profesion (descripcion,estado) values (:descripcion,:estado)';
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

    public function delete(\Profesion $object) {
        try {
            $sql = 'UPDATE inv_profesion SET estado=0 WHERE id_profesion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdProfesion(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Profesion $object) {
        try {
            $sql = 'UPDATE inv_profesion SET descripcion=:descripcion, estado=:estado WHERE id_profesion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdProfesion(), PDO::PARAM_INT);
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
        $profesiones = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT p.id_profesion AS id, p.descripcion FROM inv_profesion p
            WHERE p.estado=1 group by p.id_profesion  order by p.id_profesion asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $profesiones[] = new Profesion($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $profesiones;
    }

    public function listarId($id) {
        $profesiones = null;
        try {
            $sql = 'SELECT * from inv_profesion WHERE id_profesion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $profesiones = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $profesiones;
    }

}
