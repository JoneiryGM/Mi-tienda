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
               <li><a href="#">Mis pedidos</a></li>
               <li><a href="#">Gestionar Pedidos</a></li>
               <li><a href="#">Gestionar Categorias</a></li>
               <!-- link para cerrar session -->
               <li><a href="<?=base_url?>usuario/logout">Cerrar Session</a></li>
            </ul>
           </div>
        </aside>

        
        <!-- 4-CONTENIDO CENTRAL -->
        <div id="central"> 