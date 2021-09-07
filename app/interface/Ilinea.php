<?php

interface Ilinea {

    public function crear(Linea $object);

    public function editar(Linea $object);

    public function delete(Linea $object);

    public function listar();

    public function listarId($id);
}
