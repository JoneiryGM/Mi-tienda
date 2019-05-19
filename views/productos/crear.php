<h1>CREAR NUEVOS PRODUCTOS</h1>

<form action="<?=base_url?>productos/save" method="POST">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">

    <label for="descripcion">Descripcion</label>
    <textarea  name="descripcion" cols="30" rows="05"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio">

    <label for="stock">Stock</label>
    <input type="number" name="stock">

    <label for="categoria">Categoria</label>
    <?php $categorias = utils::showCategorias();?>
    <select name="categoria">

       <?php while($mostrar_categorias = $categorias->fetch_object()):?>
       <option value="<?=$mostrar_categorias->id;?>">
          <?=$mostrar_categorias->nombre;?>
       </option>
       <?php endwhile;?>
    </select> 
    
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen">
    <br> <br>

    <input type="submit" value="Guardar Producto">
</form>