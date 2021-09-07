<?php

class daoPersonal implements Ipersonal {

    public function listar() {
        $personales = array();
        try {
            $sql = 'select idpersonal as id,
            apellidospersonal, nombrespersonal
            from personal  
            where EstadoPersonal = "A" group by idpersonal  order by idpersonal asc';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $personales[] = new Personal($obj->id, $obj->nombrespersonal, $obj->apellidospersonal, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $personales;
    }

}
