<?php

interface Iautor {

    public function crear(Autor $object);

    public function editar(Autor $object);

    public function delete(Autor $object);

    public function listar();

    public function listarId($id);
}
