<?php

class daoProduccion implements Iproduccion {

    public function crear(\Produccion $object) {
        try {
            $sql = 'insert into inv_produccion (codigo,titulo,id_autor1,id_autor2,id_autor3,id_autor4,id_autor5,issn,fecha_publicacion,id_revista,id_tipo_produccion,url,digital,fisico,id_area,id_sublinea,observacion) values (:codigo,:titulo,:idAutor1,:idAutor2,:idAutor3,:idAutor4,:idAutor5,:issn,:fecha_publicacion,:idRevista,:idTipoProduccion,:url,:digital,:fisico,:idArea,:idSublinea,:observacion)';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':codigo', $object->getCodigo(), PDO::PARAM_STR);
            $stmp->bindParam(':titulo', $object->getTitulo(), PDO::PARAM_STR);
            $stmp->bindParam(':idAutor1', $object->getIdAutor1(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor2', $object->getIdAutor2(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor3', $object->getIdAutor3(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor4', $object->getIdAutor4(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor5', $object->getIdAutor5(), PDO::PARAM_INT);
            $stmp->bindParam(':issn', $object->getIssn(), PDO::PARAM_STR);
            $stmp->bindParam(':fecha_publicacion', date($object->getFechaPublicacion()), PDO::PARAM_STR);
            $stmp->bindParam(':idRevista', $object->getIdRevista(), PDO::PARAM_INT);
            $stmp->bindParam(':idTipoProduccion', $object->getIdTipoProduccion(), PDO::PARAM_INT);
            $stmp->bindParam(':url', $object->getUrl(), PDO::PARAM_STR);
            $stmp->bindParam(':digital', $object->getDigital(), PDO::PARAM_INT);
            $stmp->bindParam(':fisico', $object->getFisico(), PDO::PARAM_INT);
            $stmp->bindParam(':idArea', $object->getIdArea(), PDO::PARAM_INT);
            $stmp->bindParam(':idSublinea', $object->getIdSublinea(), PDO::PARAM_INT);
            $stmp->bindParam(':observacion', $object->getObservacion(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function delete(\Produccion $object) {
        try {
            $sql = 'UPDATE inv_produccion SET estado=0 WHERE id_produccion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdProduccion(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function editar(\Produccion $object) {
        try {
            $sql = 'UPDATE inv_produccion SET codigo=:codigo,titulo=:titulo,id_autor1=:idAutor1,id_autor2=:idAutor2,id_autor3=:idAutor3,id_autor4=:idAutor4,id_autor5=:idAutor5,issn=:issn,fecha_publicacion=:fecha_publicacion,id_revista=:idRevista,id_tipo_produccion=:idTipoProduccion,url=:url,digital=:digital,fisico=:fisico,id_area=:idArea,id_sublinea=:idSublinea,observacion=:observacion,estado=:estado WHERE id_produccion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $object->getIdProduccion(), PDO::PARAM_INT);
            $stmp->bindParam(':codigo', $object->getCodigo(), PDO::PARAM_STR);
            $stmp->bindParam(':titulo', $object->getTitulo(), PDO::PARAM_STR);
            $stmp->bindParam(':idAutor1', $object->getIdAutor1(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor2', $object->getIdAutor2(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor3', $object->getIdAutor3(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor4', $object->getIdAutor4(), PDO::PARAM_INT);
            $stmp->bindParam(':idAutor5', $object->getIdAutor5(), PDO::PARAM_INT);
            $stmp->bindParam(':issn', $object->getIssn(), PDO::PARAM_STR);
            $stmp->bindParam(':fecha_publicacion', date($object->getFechaPublicacion()), PDO::PARAM_STR);
            $stmp->bindParam(':idRevista', $object->getIdRevista(), PDO::PARAM_INT);
            $stmp->bindParam(':idTipoProduccion', $object->getIdTipoProduccion(), PDO::PARAM_INT);
            $stmp->bindParam(':url', $object->getUrl(), PDO::PARAM_STR);
            $stmp->bindParam(':digital', $object->getDigital(), PDO::PARAM_INT);
            $stmp->bindParam(':fisico', $object->getFisico(), PDO::PARAM_INT);
            $stmp->bindParam(':idArea', $object->getIdArea(), PDO::PARAM_INT);
            $stmp->bindParam(':idSublinea', $object->getIdSublinea(), PDO::PARAM_INT);
            $stmp->bindParam(':observacion', $object->getObservacion(), PDO::PARAM_STR);
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
        $producciones = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT pr.id_produccion , pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1 , 
            (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
            (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
            pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion,pr.url, pr.digital,
            pr.fisico, ar.descripcion id_area, sb.descripcion id_sublinea, pr.observacion, pr.estado 
            FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
            pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea where pr.estado=1 
            GROUP BY pr.id_produccion  order by pr.id_produccion  asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $producciones[] = new Produccion($obj->id_produccion, $obj->codigo, $obj->titulo, $obj->id_autor1, $obj->id_autor2, $obj->id_autor3,
                        $obj->id_autor4, $obj->id_autor5, $obj->issn, $obj->fecha_publicacion, $obj->id_revista, $obj->id_tipo_produccion, $obj->url, $obj->digital, $obj->fisico,
                        $obj->id_area, $obj->id_sublinea, $obj->observacion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $producciones;
    }

    public function listarId($id) {
        $produccion = null;
        try {
            $sql = 'SELECT * from inv_produccion WHERE id_produccion = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $id, PDO::PARAM_INT);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $produccion = $obj;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $produccion;
    }


    public function listarAutor() {
        $producciones = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT   pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1, 
            (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
            (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
            pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion, ar.descripcion id_area, pr.observacion, pr.estado 
            FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
            pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea where pr.estado=1 
            GROUP BY pr.id_produccion  order by pr.id_autor1 asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $producciones[] = new Produccion($obj->id_produccion, $obj->codigo, $obj->titulo, $obj->id_autor1, $obj->id_autor2, $obj->id_autor3,
                        $obj->id_autor4, $obj->id_autor5, $obj->issn, $obj->fecha_publicacion, $obj->id_revista, $obj->id_tipo_produccion, $obj->url, $obj->digital, $obj->fisico,
                        $obj->id_area, $obj->id_sublinea, $obj->observacion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $producciones;
    }

    public function listarTipo() {
        $producciones = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT   pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1, 
            (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
            (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
            pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion, ar.descripcion id_area, pr.observacion, pr.estado 
            FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
            pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea where pr.estado=1 
            GROUP BY pr.id_produccion  order by pr.id_tipo_produccion asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $producciones[] = new Produccion($obj->id_produccion, $obj->codigo, $obj->titulo, $obj->id_autor1, $obj->id_autor2, $obj->id_autor3,
                        $obj->id_autor4, $obj->id_autor5, $obj->issn, $obj->fecha_publicacion, $obj->id_revista, $obj->id_tipo_produccion, $obj->url, $obj->digital, $obj->fisico,
                        $obj->id_area, $obj->id_sublinea, $obj->observacion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $producciones;
    }

}
