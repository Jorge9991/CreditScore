<?php

class daoPeriodoLectivo implements Iperiodolectivo {

    public function listar() {
        // Definir un array tipo periodo lectivo
        $periodosLectivos = array();
        // Defino un try catch para contener errores
        try {
            $sql = 'select pl.IdPeriodoLectivo as id,
            pl.DescripPeriodoLect as nombre
            from periodolectivo pl 
            where pl.EstadoPeriodoLectivo = "A" group by pl.IdPeriodoLectivo  order by pl.IdPeriodoLectivo asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $periodosLectivos[] = new PeriodoLectivo($obj->id, $obj->nombre, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $periodosLectivos;
    }

}
