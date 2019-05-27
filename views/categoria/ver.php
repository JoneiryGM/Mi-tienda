<?php if(isset($categorias)): ?>
<h1><?=$categorias->nombre?></h1>

<?php if($productos->num_rows == 0): ?>
     <p>No hay producto que mostrar</p>
<?php else: ?>

<?php while($product = $productos->fetch_object()):?>
           <div class="product">
             <img src="<?=base_url?>uploads/images/<?=$product->imagen;?>" alt="">
             <h2><?=$product->nombre;?></h2>
             <p><?=$product->precio;?></p>
             <a href="" class="buttom">Comprar</a>
           </div>
           <?php endwhile;?>
<?php endif; ?>


<?php else: ?>
<h1>La Categoria no existe</h1>
<?php endif; ?>