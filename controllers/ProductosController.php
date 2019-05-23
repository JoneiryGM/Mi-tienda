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
            // parseo de la variable
            $parStock = (int)$stock;
            $categorias = isset($_POST['categoria']) ? $_POST['categoria'] : false; 
            // parseo de la variable
            $categoria = (int)$categorias;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            
            if($nombre && $descripcion && $precio && $parStock && $categoria)
            {
                $producto = new ProductosModel();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                
                // guardar la imagen
                $file = $_FILES['imagen'];
                $fileName = $file['name'];
                $mimeType = $file['type'];

                // var_dump($mimeType);
                // die();
                // comprobando los tipos de mime type, de la imagen
                if($mimeType == "image/jpg" || $mimeType == "image/jpeg" || $mimeType == "image/png" || $mimeType == "image/git")
                {
                    if(!is_dir('uploads/images'))
                    {
                        mkdir('uploads/images', 0777, true);
                    }
                    $producto->setImagen($fileName);
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$fileName);
                }

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
        header("Location:".base_url.'productos/gestion');
    }

    public function eliminar()
    {
        utils::isAdmin();
        
        if(isset($_GET['id']))
        {
            $parameter_id = $_GET['id'];
            $producto = new ProductosModel();
            $producto->setId($parameter_id);
            $delete = $producto->delete();

            if($delete)
            {
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed, no llego el parametro deseado';
        }

        header("Location:".base_url.'productos/gestion');
        
    }

    public function editar()
    {
        utils::isAdmin();
    }
}