<h1>Registrarse</h1>

<?php 
if(isset($_SESSION['register'])):
   echo $_SESSION['register'];
endif; 
?>


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