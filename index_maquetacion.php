<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Maqueta del proyecto</title>
</head>
<body>
<div id="container">
    <!-- LAS SECCIONES DEL INDEX: -->
    <!-- 1-CEBECERA -->
    <header id="header">
        <div id="logo">
           <img src="assets/img/ceta.png" alt="Logo camiseta">
           <a href="index.php">
           Tienda de camiseta
           </a>
        </div>
    </header>
    <!-- <?php require_once 'views/layout_page_principal/cabecera.php';?> -->

    <!-- 2-MENU -->
    <nav id="menu">
    <ul>
       <li>
          <a href="#">Inicio</a>
       </li>
       <li>
          <a href="#">Categoria1</a>
       </li>
       <li>
          <a href="#">Categoria2</a>
       </li>
       <li>
          <a href="#">Categoria3</a>
       </li>
       <li>
          <a href="#">Categoria4</a>
       </li>
       <li>
          <a href="#">Categoria5</a>
       </li>
    </ul>
    </nav>

    <div id="content">
        <!-- 3-BARRA LATERAL -->
        <aside id="lateral"> 
           <div id="login" class="block_aside">
              <h3>Entrar a la Web</h3>
             <form action="" method="post">
               <label for="email">E-mail</label>
               <input type="email" name="email"> 

               <label for="pass">Password</label>
               <input type="password" name="pass"> 

               <input type="submit" value="Enviar">
             </form>

             <ul>
               <li><a href="#">Mis pedidos</a></li>
               <li><a href="#">Gestionar Pedidos</a></li>
               <li><a href="#">Gestionar Categorias</a></li>
            </ul>
           </div>
        </aside>

        <!-- 4-CONTENIDO CENTRAL -->
        <div class="central"> 

           <div class="product">
             <img src="assets/img/ceta.png" alt="">
             <h2>Camiseta Negra sport</h2>
             <p>30 dolares</p>
             <a href="">Comprar</a>
           </div>

           <div class="product">
             <img src="assets/img/ceta2.jpg" alt="">
             <h2>Camiseta Negra sport</h2>
             <p>30 dolares</p>
             <a href="">Comprar</a>
           </div>

           <div class="product">
             <img src="assets/img/ceta3.jpg" alt="">
             <h2>Camiseta Negra sport</h2>
             <p>30 dolares</p>
             <a href="">Comprar</a>
           </div>
        </div>
    </div>

    <!-- 5-PIE DE PAGINA -->
    <footer id ="footer"> 
        <p>Desarrollado por Joneiry Guzman Montero  &copy; <?=date('Y');?></p>
    </footer>
</div>
</body>
</html>