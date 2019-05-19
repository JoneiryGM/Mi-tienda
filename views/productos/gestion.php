<h1>Gestion de Productos</h1>

<a href="<?=base_url?>productos/crear" class="buttom buttom-small">
   Crear Productos
</a>


<table>
   <tr>
      <th>ID</th>
      <th>FECHA</th>
      <th>NOMBRE</th>
      <th>PRECIO</th>
      <th>STOCK</th>
  </tr>

   <?php while($mostrar = $getAll->fetch_object()):?>

   <tr>
      <td><?=$mostrar->id;?></td>
      <td><?=$mostrar->fecha;?></td>
      <td><?=$mostrar->nombre;?></td>
      <td><?=$mostrar->precio;?></td>
      <td><?=$mostrar->stock;?></td>
   </tr>

   <?php endwhile;?>
</table>