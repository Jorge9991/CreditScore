<?php

class daoTipoProduccion implements Itipoproduccion {

    //put your code here
    public function crear(\TipoProduccion $object) {
        try {
            $sql = 'insert into inv_tipo_produccion (descripcion,estado) values (:descripcion,:estado)';
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

    public function delete(\TipoProduccion $object) {
        try {
            $sql = 'UPDATE inv_tipo_produccion SET estado=:estado WHERE id_tipo_produccion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':estado', $object->getEstado(), PDO::PARAM_INT);
            $stmp->bindParam(':id', $object->getIdTipoProduccion(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\TipoProduccion $object) {
        try {
            $sql = 'UPDATE inv_tipo_produccion SET descripcion=:descripcion, estado=:estado WHERE id_tipo_produccion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdTipoProduccion(), PDO::PARAM_INT);
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
        $tipoproduccion = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT tp.id_tipo_produccion AS id, tp.descripcion FROM inv_tipo_produccion tp
WHERE tp.estado=1 group by tp.id_tipo_produccion  order by tp.id_tipo_produccion asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tipoproduccion[] = new TipoProduccion($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tipoproduccion;
    }

    public function listarId($id) {
        $tipoproduccion = null;
        try {
            $sql = 'SELECT * from inv_tipo_produccion WHERE id_tipo_produccion = :id';
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
