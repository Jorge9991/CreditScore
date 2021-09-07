<?php

interface Irevista {

    public function crear(Revista $object);

    public function editar(Revista $object);

    public function delete(Revista $object);

    public function listar();

    public function listarId($id);
}
