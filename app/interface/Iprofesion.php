<?php

interface Iprofesion {

    public function crear(Profesion $object);

    public function editar(Profesion $object);

    public function delete(Profesion $object);

    public function listar();

    public function listarId($id);
}
