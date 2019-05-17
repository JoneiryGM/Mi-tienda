<?php
require_once 'models/CategoriaModel.php';

class CategoriaController
{
    public function Index(){
        utils::isAdmin();
        $categoria = new CategoriaModel();
        $getAll = $categoria->getcategorias();
        require_once 'views/categoria/index.php';
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