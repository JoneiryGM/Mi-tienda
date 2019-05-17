
<h1>Gestionar Categorias</h1>

<a href="<?=base_url?>categoria/crear" class="buttom buttom-small">
Crear Categorias
</a>
<table>
   <tr>
      <th>ID</th>
      <th>NOMBRE</th>
  </tr>

   <?php while($mostrar = $getAll->fetch_object()):?>

   <tr>
      <td><?=$mostrar->id;?></td>
      <td><?=$mostrar->nombre;?></td>
   </tr>

   <?php endwhile;?>
</table>