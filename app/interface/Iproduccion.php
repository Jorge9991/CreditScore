<?php

interface Iproduccion {

    public function crear(Produccion $object);

    public function editar(Produccion $object);

    public function delete(Produccion $object);

    public function listar();

    public function listarAutor();

    public function listarTipo();

    public function listarId($id);
}
