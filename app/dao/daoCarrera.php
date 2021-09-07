<?php

class daoCarrera implements Icarrera {

    public function listar() {
        $carreras = array();
        try {
            $sql = 'select c.IdCarrera as id, c.NombreCarrera as nombre from carrera c where c.EstadoCarrera = "A" group by c.IdCarrera  order by c.IdCarrera asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $carreras[] = new Carrera($obj->id, $obj->nombre, 0,0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $carreras;
    }
}
