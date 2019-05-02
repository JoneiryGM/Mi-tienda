<h1>Registrarse</h1>

<?php 
if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
   <strong>Registro Completado Correctamente</strong>
 
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
   <strong>Registro Fallido</strong>
<?php endif; ?>
 
<?php utils::deleteSession('register');?>


<form action="save" method="POST">

<label for="nombre">Nombre</label>
<input type="text" name="nombre"> <br>

<label for="apellido">Apellido</label>
<input type="text" name="apellido"> <br>

<label for="email">E-mail</label>
<input type="email" name="email"> <br>

<label for="pass">Contraseña</label>
<input type="password" name="pass"> <br>

<input type="submit" value="Registrar">
</form>