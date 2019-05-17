
<h1>Gestionar Categorias</h1>

<table id="table">
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