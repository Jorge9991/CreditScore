<?php

interface Iindexacion {

    public function crear(Indexacion $object);

    public function editar(Indexacion $object);

    public function delete(Indexacion $object);

    public function listar();

    public function listarId($id);
}
