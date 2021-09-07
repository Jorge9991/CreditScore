<?php

class daoPeriodoAcademico implements Iperiodoacademico {

    public function listar() {
        $periodosacademicos = array();
        try {
            $sql = 'select IdPeriodoacademico as id,
            nombreperiodoacademico as descripcion
            from periodoacademico 
            where EstadoPeriodoacademico = "A" group by IdPeriodoacademico  order by IdPeriodoacademico asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $periodosacademicos[] = new PeriodoAcademico($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $periodosacademicos;
    }

}
