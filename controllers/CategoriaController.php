<?php
require_once 'models/CategoriaModel.php';
require_once 'models/ProductosModel.php';

class CategoriaController
{
    public function Index(){
        utils::isAdmin();
        $categoria = new CategoriaModel();
        $getAll = $categoria->getcategorias();
        require_once 'views/categoria/index.php';
    }

    public function verCategorias()
    {
        if(isset($_GET['id']))
        {
            $parameter_id = $_GET['id'];

            // conseguir la categoria
            $categoria = new CategoriaModel();
            $categoria->setId($parameter_id);
            $categorias = $categoria->getOne();
          
            // conseguir productos
            $producto = new ProductosModel();
            $producto->setCategoria_id($parameter_id);
            $productos = $producto->getAll_Category();
            
        }  
        require_once 'views/categoria/ver.php';
    }

    public function crear()
    {
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        utils::isAdmin();
        
        // comprobar los datos por POST
        if(isset($_POST) && isset($_POST['nombre']))
        {
            // guardar la categoria a la BD
            $categoria = new CategoriaModel();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }

        header("Location:".base_url."categoria/Index");
    }
}