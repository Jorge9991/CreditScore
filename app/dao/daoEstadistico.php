<?php

require_once '../conexion/DataBase.php';
date_default_timezone_set("America/Guayaquil");

class daoEstadistico {

  
      public function pM1($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=1 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM1($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=1 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM1($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=1 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM1($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=1 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    // mes febrero
    
        public function pM2($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=2 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM2($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=2 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM2($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=2 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM2($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=2 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
    // mes marzo
    
    public function pM3($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=3 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM3($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=3 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM3($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=3 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM3($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=3 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    // mes abril
    
    
      public function pM4($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=4 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM4($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=4 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM4($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=4 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM4($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=4 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
        // mes mayo
    
    
      public function pM5($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=5 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM5($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=5 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM5($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=5 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM5($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=5 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    // mes junio
    
    
      public function pM6($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=6 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM6($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=6 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM6($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=6 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM6($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=6 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
    // mes julio
    
    
      public function pM7($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=7 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM7($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=7 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM7($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=7 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM7($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=7 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     // mes agosto
    
    
      public function pM8($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=8 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM8($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=8 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM8($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=8 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM8($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=8 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
      // mes septiembre
    
    
      public function pM9($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=9 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM9($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=9 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM9($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=9 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM9($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=9 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
    // mes octubre
    
    
      public function pM10($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=10 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM10($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=10 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM10($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=10 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM10($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=10 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
    // mes noviembre sin ti
    
    
      public function pM11($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=11 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM11($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=11 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM11($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=11 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM11($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=11 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
    // mes diciembre
    
    
      public function pM12($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 1
and month(fecha_publicacion)=12 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

      public function lM12($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 2
and month(fecha_publicacion)=12 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function cM12($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 3
and month(fecha_publicacion)=12 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
     public function aM12($anio) {
        try {
            $sql = 'SELECT count(id_produccion) as blue FROM bd_investigacion.inv_produccion where id_tipo_produccion = 4
and month(fecha_publicacion)=12 and year(fecha_publicacion) = "' . $anio . '" ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    
    
}

?>