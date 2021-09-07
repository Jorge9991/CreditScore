<?php

interface Itipoproduccion {

    public function crear(TipoProduccion $object);

    public function editar(TipoProduccion $object);

    public function delete(TipoProduccion $object);

    public function listar();

    public function listarId($id);
}
