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

    public function crear()
    {
        require_once 'views/productos/crear.php';
    }

    public function save()
    {
        utils::isAdmin();
        if(isset($_POST))
        {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $parStock = (int)$stock;
            $categorias = isset($_POST['categoria']) ? $_POST['categoria'] : false; 
            $categoria = (int)$categorias;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            var_dump($categoria);
            if($nombre && $descripcion && $precio && $parStock && $categoria)
            {
                $producto = new ProductosModel();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                // seguarda el objeto
                $save = $producto->save();

                if($save == true)
                {
                    $_SESSION['producto'] = "COMPLETE";
                }else{
                    $_SESSION['producto'] = "FAILED";
                    var_dump($_SESSION['producto']);
                }

            }else{
                $_SESSION['producto'] = "FAILED, Datos Mal Insertados";
                var_dump($_SESSION['producto']);
            }


        }else{
            $_SESSION['producto'] = "FAILED, al Recibir los datos";
            var_dump($_SESSION['producto']);
        }
        // header("Location:".base_url.'productos/gestion');
    }
}