<h1>Gestionar categorias</h1>


<?php while($mostrar = $getAll->fetch_object()):?>
<?=$mostrar->nombre;?>-   ||   -<?=$mostrar->id;?>

<?php endwhile;?>