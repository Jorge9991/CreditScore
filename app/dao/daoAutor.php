<?php

class daoAutor implements Iautor {

    public function crear(\Autor $object) {
        try {
            $sql = 'insert into inv_autor (cedula,nombre,apellido,telefono,correo,id_profesion,estado) values (:cedula,:nombre,:apellido,:telefono,:correo,:idProfesion,:estado)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':cedula', $object->getCedula(), PDO::PARAM_STR);
            $stmp->bindParam(':nombre', $object->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':apellido', $object->getApellido(), PDO::PARAM_STR);
            $stmp->bindParam(':telefono', $object->getTelefono(), PDO::PARAM_STR);
            $stmp->bindParam(':correo', $object->getCorreo(), PDO::PARAM_STR);
            $stmp->bindParam(':idProfesion', $object->getIdProfesion(), PDO::PARAM_INT);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\Autor $object) {
        try {
            $sql = 'UPDATE inv_autor SET estado=0 WHERE id_autor = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdAutor(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Autor $object) {
        try {
            $sql = 'UPDATE inv_autor SET cedula=:cedula,nombre=:nombre,apellido=:apellido,telefono=:telefono,correo=:correo,id_profesion=:idProfesion, estado=:estado WHERE id_autor = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdAutor(), PDO::PARAM_INT);
            $stmp->bindParam(':cedula', $object->getCedula(), PDO::PARAM_STR);
            $stmp->bindParam(':nombre', $object->getNombre(), PDO::PARAM_STR);
            $stmp->bindParam(':apellido', $object->getApellido(), PDO::PARAM_STR);
            $stmp->bindParam(':telefono', $object->getTelefono(), PDO::PARAM_STR);
            $stmp->bindParam(':correo', $object->getCorreo(), PDO::PARAM_STR);
            $stmp->bindParam(':idProfesion', $object->getIdProfesion(), PDO::PARAM_INT);
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
        $autores = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'select u.id_autor,u.cedula,u.nombre,u.apellido,u.telefono,u.correo,t.descripcion id_profesion,u.estado
            from inv_autor u,inv_profesion t where u.id_profesion=t.id_profesion AND u.estado = 1 order by u.apellido asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $autores[] = new Autor($obj->id_autor, $obj->cedula, $obj->nombre, $obj->apellido, $obj->telefono, $obj->correo, $obj->id_profesion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $autores;
    }

    public function listarId($id) {
        $autor = null;
        try {
            $sql = 'SELECT * from inv_autor WHERE id_autor = :id ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $autor = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $autor;
    }

}
