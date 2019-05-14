<?php
require_once 'models/CategoriaModel.php';

class CategoriaController
{
    public function Index(){
        $categoria = new CategoriaModel();
        $cate_vistas = $categoria->getcategorias();
        require_once 'views/categoria/index.php';
    }
}