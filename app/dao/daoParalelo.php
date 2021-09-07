<?php

class daoParalelo implements Iparalelo {

    public function listar() {
        $paralelos = array();
        try {
            $sql = 'select IdParalelo as id,
            descRipParalelo as descripcion
            from paralelo 
            where EstadoParalelo = "A" group by id  order by id asc;';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $paralelos[] = new Paralelo($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $paralelos;
    }

}
