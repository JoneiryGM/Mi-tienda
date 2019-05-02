<?php
require_once 'models/UsuarioModel.php';

class UsuarioController
{
    public function Index(){
        return 'index del usuario';
    }

    public function register()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if(isset($_POST)){
            $usuario = new UsuarioModel();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellido']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPass($_POST['pass']);
            
            $save = $usuario->save();

            if($save){
                $_SESSION['register'] = "complete";
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = "failed";
         
        }
        header("location:".base_url.'usuario/register');
    }
}