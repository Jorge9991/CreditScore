<?php

interface Iarea {

    public function crear(Area $object);

    public function editar(Area $object);

    public function delete(Area $object);

    public function listar();

    public function listarId($id);
}
