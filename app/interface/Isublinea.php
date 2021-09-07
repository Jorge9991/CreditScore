<?php

interface Isublinea {

    public function crear(Sublinea $object);

    public function editar(Sublinea $object);

    public function delete(Sublinea $object);

    public function listar();

    public function listarId($id);
}
