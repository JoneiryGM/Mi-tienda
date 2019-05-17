<?php
require_once 'models/ProductosModel.php';

class ProductosController
{
    public function index(){
        require_once 'views/productos/destacados.php';
    }

    public function gestion()
    {
        utils::isAdmin();
        $productos = new ProductosModel();
        $getAll = $productos->getAll();
        require_once 'views/productos/gestion.php';
    }
}