<h1>Bienvenido a mi WEB</h1>
<?php

require_once 'autoload.php';


if(isset($_GET['controller']))
{
    $nombre_controlador = $_GET['controller'].'Controller';
    
}else{
    echo 'la pagina no existe';
    exit();
}


if (isset($nombre_controlador) && class_exists($nombre_controlador)) {
    
    $controlador = new $nombre_controlador();
   
     if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
         $action = $_GET['action'];
         echo $controlador->$action();
     }else{
        echo "La metodo que buscas no existe";
     }
}