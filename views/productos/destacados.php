
           <h1>Algunos Productos</h1>

           <?php while($product = $productos->fetch_object()):?>
           <div class="product">
             <img src="<?=base_url?>uploads/images/<?=$product->imagen;?>" alt="">
             <h2><?=$product->nombre;?></h2>
             <p><?=$product->precio;?> dolares</p>
             <a href="" class="buttom">Comprar</a>
           </div>
           <?php endwhile;?>

           <!-- <?=base_url?>assets/img/ceta.png -->