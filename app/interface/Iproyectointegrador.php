<?php

interface Iproyectointegrador {

    public function crear(ProyectoIntegrador $proyectointegrador);

    public function editar(ProyectoIntegrador $proyectointegrador);

    public function delete(ProyectoIntegrador $proyectointegrador);

    public function listar();

    public function listarId($id);

    public function evaluar(ProyectoIntegrador $proyectointegrador);
}
