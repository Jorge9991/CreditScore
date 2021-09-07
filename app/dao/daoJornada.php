<?php

class daoJornada implements Ijornada {

    public function listar() {
        //Array
        $jornadas = array();
        try {
            //Armar query con la consulta a la bd
            $sql = 'SELECT a.id_jornada as id, a.descripcion  FROM inv_jornada a WHERE a.estado=1 group by a.id_jornada  order by a.id_jornada asc';
            //Instancio la conexxion
            $cn = DataBase::getInstancia();
            //prepara la consulta
            $stmp = $cn->prepare($sql);
            //ejecutamos la consulta
            $stmp->execute();
            //Recorro la respuesta del servidor
            //de la base de datos
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $jornadas[] = new Jornada($obj->id, $obj->descripcion, 0);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $jornadas;
    }

}
