<h1>Gestion de Productos</h1>

<a href="<?=base_url?>productos/crear" class="buttom buttom-small">
   Crear Productos
</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == "COMPLETE"):?>
    <strong style="color:blue;">El Producto Se Añadio Correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != "COMPLETE"):?>
    <strong style="color:red;">El Producto No se Guardo</strong>
<?php endif;?>

<?php utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"):?>
    <strong style="color:green;">El Producto Se Elimino Correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != "COMPLETE"):?>
    <strong style="color:red;">El Producto No se Elimino</strong>
<?php endif;?>

<?php utils::deleteSession('delete');?>
<table>
   <tr>
      <th>ID</th>
      <th>FECHA</th>
      <th>NOMBRE</th>
      <th>PRECIO</th>
      <th>STOCK</th>
      <th>ACCIONES</th>
  </tr>

   <?php while($mostrar = $getAll->fetch_object()):?>

   <tr>
      <td><?=$mostrar->id;?></td>
      <td><?=$mostrar->fecha;?></td>
      <td><?=$mostrar->nombre;?></td>
      <td><?=$mostrar->precio;?></td>
      <td><?=$mostrar->stock;?></td>
      <td>
         <a href="<?=base_url?>/productos/editar&id=<?=$mostrar->id?>" class="buttom buttom-gestion buttom-blue">Editar</a>
         <a href="<?=base_url?>/productos/eliminar&id=<?=$mostrar->id?>" class="buttom buttom-gestion buttom-red">Eliminar</a>
      </td>
   </tr>

   <?php endwhile;?>
</table>