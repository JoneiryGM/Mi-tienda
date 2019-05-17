<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    <title>Maqueta del proyecto</title>
</head>
<body>
<div id="container">
    <!-- LAS SECCIONES DEL INDEX: -->
    <!-- 1-CEBECERA -->
    <header id="header">
        <div id="logo">
           <img src="<?=base_url?>assets/img/ceta.png" alt="Logo camiseta">
           <a href="index.php">
           Tienda de camiseta
           </a>
        </div>
    </header>
    <!-- <?php require_once 'views/layout_page_principal/cabecera.php';?> -->

    <!-- 2-MENU -->
    <?php $categorias = utils::showCategorias();?>
    <nav id="menu">
    <ul>
       <li>
          <a href="#">Inicio</a>
       </li>

       <?php while($cate = $categorias->fetch_object()):?>
       <li>
          <a href="#"><?=$cate->nombre?></a>
       </li>
       <?php endwhile;?>
       
       <li>
     
    </ul>
    </nav>

    <div id="content">
