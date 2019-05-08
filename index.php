<h1>Bienvenido a mi WEB</h1>

<?php
session_start();
require_once 'autoload.php';
require_once 'config/DataBase.php';
require_once 'config/parameter.php';
require_once 'helpers/utils.php';
require_once 'views/layout_page_principal/cabecera.php';
require_once 'views/layout_page_principal/barra_lateral.php';



function show_error(){
    $error = new ErrorController();
    echo $error->index();
}

if(isset($_GET['controller']))
{
    $nombre_controlador = $_GET['controller'].'Controller';
    
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
}else{
    show_error();
    exit();
}


if (isset($nombre_controlador) && class_exists($nombre_controlador)) {
    
    $controlador = new $nombre_controlador();
   
     if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
         $action = $_GET['action'];
         echo $controlador->$action();

     }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
         
         $action_default = action_default;
         echo $controlador->$action_default();
         
     }else{
        show_error();
     }
}


require_once 'views/layout_page_principal/pie_pagina.php';