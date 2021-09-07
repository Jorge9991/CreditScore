<?php

require_once '../conexion/DataBase.php';
date_default_timezone_set("America/Guayaquil");

function fechaNormal($fecha) {
    $nfecha = date('d/m/Y', strtotime($fecha));
    return $nfecha;
}
class daoProduccionReporte {
 public function listarTodo() {
        try {
            $sql = 'SELECT pr.id_produccion , pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1 , 
            (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
            (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
            pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion,pr.url, pr.digital,
            pr.fisico, ar.descripcion id_area, sb.descripcion id_sublinea, pr.observacion, pr.estado 
            FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
            pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea where pr.estado=1 
            GROUP BY pr.id_produccion  order by pr.id_produccion  asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function buscarAllAutor($autor) {
        try {

            $sql = 'SELECT pr.id_produccion , pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") 
FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1 , 
(SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, 
(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,
(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion,pr.url, pr.digital,
pr.fisico, ar.descripcion id_area, sb.descripcion id_sublinea, pr.observacion, pr.estado 
FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp 
ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea 
WHERE pr.estado = 1 and id_autor1= "'.$autor.'" or id_autor2= "'.$autor.'" or id_autor3 ="'.$autor.'" or id_autor4 = "'.$autor.'" or id_autor5 = "'.$autor.'"  ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
 
    
    
    
       public function buscarAllFecha($desde, $hasta) {
        try {

            $sql = 'SELECT pr.id_produccion , pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1 , 
            (SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
            (SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
            pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion,pr.url, pr.digital,
            pr.fisico, ar.descripcion id_area, sb.descripcion id_sublinea, pr.observacion, pr.estado 
            FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
            pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea WHERE pr.estado = 1 and pr.fecha_publicacion BETWEEN "' . $desde . '" AND "' . $hasta . '" ORDER BY pr.fecha_publicacion DESC ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    
    
    
    
        public function tipoProduccion($tipo) {
        try {

            $sql = 'SELECT pr.id_produccion , pr.codigo, pr.titulo, (SELECT concat (a.nombre,""," ", a.apellido,"") 
FROM inv_autor a WHERE pr.id_autor1=a.id_autor AND pr.id_autor1!=1 ) id_autor1 , 
(SELECT concat (a.nombre,""," ", a.apellido,"") FROM inv_autor a WHERE  pr.id_autor2=a.id_autor AND pr.id_autor2!=1) id_autor2, 
(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor3=a.id_autor AND pr.id_autor3!=1) id_autor3, 
(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE  pr.id_autor4=a.id_autor AND pr.id_autor4!=1) id_autor4,
(SELECT concat (a.nombre,""," ", a.apellido,"")  FROM inv_autor a WHERE pr.id_autor5=a.id_autor AND pr.id_autor5!=1) id_autor5, 
pr.issn, pr.fecha_publicacion, r.nombre id_revista, tp.descripcion id_tipo_produccion,pr.url, pr.digital,
pr.fisico, ar.descripcion id_area, sb.descripcion id_sublinea, pr.observacion, pr.estado 
FROM inv_produccion pr INNER JOIN inv_revista r ON pr.id_revista=r.id_revista INNER JOIN inv_tipo_produccion tp 
ON pr.id_tipo_produccion=tp.id_tipo_produccion INNER JOIN inv_area ar ON  
pr.id_area=ar.id_area INNER JOIN inv_sublinea sb ON pr.id_sublinea=sb.id_sublinea 
WHERE pr.estado = 1 and pr.id_tipo_produccion ="'.$tipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    
    
    
 

  
    public function nameAutor($autor) {
        try {
            //SELECT concat(apellido,nombre)as nombreautor  FROM bd_investigacion.inv_autor where id_autor = "'.$autor.'"';
            $sql = 'SELECT concat(apellido,nombre)as nombreautor  FROM bd_investigacion.inv_autor where id_autor = "'.$autor.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    
    public function total($autor) {
        try {
            //SELECT concat(apellido,nombre)as nombreautor  FROM bd_investigacion.inv_autor where id_autor = "'.$autor.'"';
            $sql = 'SELECT count(codigo) as total FROM inv_produccion where estado =1 and id_autor1 ="'.$autor.'" or id_autor2 ="'.$autor.'" or id_autor3 ="'.$autor.'" or id_autor4 ="'.$autor.'" or id_autor5 ="'.$autor.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    public function ponencia($autor) {
        try {
           
            $sql = 'SELECT count(id_tipo_produccion) as ponencia from inv_produccion where 
   id_tipo_produccion = 1 and id_autor1= "'.$autor.'" 
or id_tipo_produccion = 1 and id_autor2 ="'.$autor.'" 
or id_tipo_produccion = 1 and id_autor3 ="'.$autor.'" 
or id_tipo_produccion = 1 and id_autor4= "'.$autor.'"
or id_tipo_produccion = 1 and id_autor5 ="'.$autor.'" and estado = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    
    public function libro($autor) {
        try {
           
            $sql = 'SELECT count(id_tipo_produccion) as libro from inv_produccion where 
   id_tipo_produccion = 2 and id_autor1= "'.$autor.'" 
or id_tipo_produccion = 2 and id_autor2 ="'.$autor.'" 
or id_tipo_produccion = 2 and id_autor3 ="'.$autor.'" 
or id_tipo_produccion = 2 and id_autor4= "'.$autor.'"
or id_tipo_produccion = 2 and id_autor5 ="'.$autor.'" and estado = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    public function capitulo($autor) {
        try {
           
            $sql = 'SELECT count(id_tipo_produccion) as capitulo from inv_produccion where 
   id_tipo_produccion = 3 and id_autor1= "'.$autor.'" 
or id_tipo_produccion = 3 and id_autor2 ="'.$autor.'" 
or id_tipo_produccion = 3 and id_autor3 ="'.$autor.'" 
or id_tipo_produccion = 3 and id_autor4= "'.$autor.'"
or id_tipo_produccion = 3 and id_autor5 ="'.$autor.'" and estado = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    
    public function articulo($autor) {
        try {
           
            $sql = 'SELECT count(id_tipo_produccion) as articulo from inv_produccion where 
   id_tipo_produccion = 4 and id_autor1= "'.$autor.'" 
or id_tipo_produccion = 4 and id_autor2 ="'.$autor.'" 
or id_tipo_produccion = 4 and id_autor3 ="'.$autor.'" 
or id_tipo_produccion = 4 and id_autor4= "'.$autor.'"
or id_tipo_produccion = 4 and id_autor5 ="'.$autor.'" and estado = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    
    
     
    
    public function totalfecha($desde, $hasta) {
        try {

            $sql = 'SELECT count(id_produccion) as total from inv_produccion where estado =1 and fecha_publicacion BETWEEN "' . $desde . '" AND "' . $hasta . '"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function ponenciafecha($desde, $hasta) {
        try {

            $sql = 'SELECT count(id_produccion) as ponencia from inv_produccion where estado =1 and fecha_publicacion BETWEEN "' . $desde . '" AND "' . $hasta . '" and id_tipo_produccion =1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function librofecha($desde, $hasta) {
        try {

            $sql = 'SELECT count(id_produccion) as libro from inv_produccion where estado =1 and fecha_publicacion BETWEEN "' . $desde . '" AND "' . $hasta . '" and id_tipo_produccion =2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function capitulofecha($desde, $hasta) {
        try {

            $sql = 'SELECT count(id_produccion) as capitulo from inv_produccion where estado =1 and fecha_publicacion BETWEEN "' . $desde . '" AND "' . $hasta . '" and id_tipo_produccion =3';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function articulofecha($desde, $hasta) {
        try {

            $sql = 'SELECT count(id_produccion) as articulo from inv_produccion where estado =1 and fecha_publicacion BETWEEN "' . $desde . '" AND "' . $hasta . '" and id_tipo_produccion =4';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (Exception $e) {
            throw $e;
        }
    }
    

       
    

}

?>