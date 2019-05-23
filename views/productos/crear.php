
<?php if(isset($edit) && isset($updating) && is_object($updating)):?>
    <h1>EDITAR PRODUCTOS-<?=$updating->nombre;?></h1>
    <?php $url_action = base_url."productos/save&id=".$updating->id;?>
<?php else:?>
    <h1>CREAR NUEVOS PRODUCTOS</h1>
    <?php $url_action = base_url."productos/save"; ?>
<?php endif;?>

<form action="<?=$url_action;?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= isset($updating) && is_object($updating)? $updating->nombre : '';  ?>">

    <label for="descripcion">Descripcion</label>
    <textarea  name="descripcion" cols="30" rows="05">
    <?= isset($updating) && is_object($updating)? $updating->descripcion : '';  ?>
    </textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?= isset($updating) && is_object($updating)? $updating->precio : '';  ?>">

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= isset($updating) && is_object($updating)? $updating->stock : '';  ?>">

    <label for="categoria">Categoria</label>
    <?php $categorias = utils::showCategorias();?>
    <select name="categoria">

       <?php while($mostrar_categorias = $categorias->fetch_object()):?>
       <option value="<?=$mostrar_categorias->id;?>" <?= isset($updating) && is_object($updating) && $updating->id==$mostrar_categorias->id?'selected': '';  ?>>
          <?=$mostrar_categorias->nombre;?>
       </option>
       <?php endwhile;?>
    </select> 
    
    <label for="imagen">Imagen</label>
    <?php if(isset($updating) && is_object($updating) && !empty($updating->imagen)):?>
      <img src="<?=base_url?>uploads/images/<?=$updating->imagen;?>" class="thumb">
    <?php endif;?>
    <input type="file" name="imagen">
    <br> <br>

    <input type="submit" value="Guardar">
</form>