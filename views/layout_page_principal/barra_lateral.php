<!-- 3-BARRA LATERAL -->
        <aside id="lateral"> 

           <div id="login" class="block_aside">

           <?php if(!isset($_SESSION['identity'])):?>

              <h3>Entrar a la Web</h3>
             <form action="<?=base_url?>usuario/login" method="post">
               <label for="email">E-mail</label>
               <input type="email" name="email"> 

               <label for="pass">Password</label>
               <input type="password" name="pass"> 

               <input type="submit" value="Enviar">
             </form>

             
            
           <?php else:?>
             <h3><?=$_SESSION['identity']->nombre?>-<?=$_SESSION['identity']->apellidos?></h3>
          <?php endif;?>


             <ul>
               
               <!-- enlaces solo para los admin -->
               <?php if(isset($_SESSION['admin'])):?>
                   <li><a href="<?=base_url?>categoria/Index">Gestionar Categorias</a></li>
                   <li><a href="<?=base_url?>productos/gestion">Gestionar Productos</a></li>
                   <li><a href="#">Gestionar Pedidos</a></li>
               <?php endif;?>

               <?php if(isset($_SESSION['identity'])):?>
                   <!-- link para cerrar session -->
                   <li><a href="#">Mis Pedidos</a></li>
                   <li><a href="<?=base_url?>usuario/logout">Cerrar Session</a></li>
               <?php else:?>    
                   <li><a href="<?=base_url?>usuario/register">Registrate aqui</a></li>
               <?php endif?>    
            </ul>
           </div>
        </aside>

        
        <!-- 4-CONTENIDO CENTRAL -->
        <div id="central"> 