<?php

interface Itiporevista {

    public function crear(TipoRevista $object);

    public function editar(TipoRevista $object);

    public function delete(TipoRevista $object);

    public function listar();

    public function listarId($id);
}
