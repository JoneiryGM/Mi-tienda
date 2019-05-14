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
            $nombre = isset($_POST['nombre'])? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellido'])? $_POST['apellido']: false;
            $email = isset($_POST['email'])? trim($_POST['email']) : false;
            $pass = isset($_POST['pass'])? $_POST['pass'] : false;
            
                $usuario = new UsuarioModel();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPass($pass);
                
                $errores = array();
                $save = $usuario->save();

                // validacion del nombre
                if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre))
                {
                    $nombre_validado = true;
                }else{
                    $nombre_validado = false;
                    $errores['nombre'] = 'el nombre no es valido :/';
                }

                // validacion del apellido
                if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos))
                {
                    $apellido_validado = true;
                }else{
                    $apellido_validado = false;
                    $errores['apellido'] = 'el apellido no es valido :/';
                }

                // validacion del correo
                if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $email_validado = true;
                }else{
                    $email_validado = false;
                    $errores['email'] = 'el correo no es valido :/';
                }

                // validacion del password
                if(!empty($pass) )
                {
                    $pass_validado = true;
                }else{
                    $pass_validado = false;
                    $errores['pass'] = 'el contraseña no es valido :/';
                }

                $guardar_usuarios = false;
                if(count($errores) == 0){
                    $guardar_usuarios = true;

                    // guardamos los datos
                    if($save){
                        $_SESSION['register'] = "complete";
                    }else{
                        $_SESSION['register'] = "failed";
                        echo "algo anda mal :/";
                    }
                }else{
                    $_SESSION['register'] = "failed";
                    echo "Dato mal insertado :/";
                }
           

        }else{
            $_SESSION['register'] = "failed";
         
        }
        header("location:".base_url.'usuario/register');
    }

    public function login()
    {
        if(isset($_POST))
        {
            // IDENTIFICAR AL USUARIO
            // Consulta a la bd
            $usuario = new UsuarioModel();
            $usuario->setEmail($_POST['email']);
            $usuario->setPass($_POST['pass']);

            $identity = $usuario->login();

            var_dump($identity);
            die();
            // Crear una session
      
        }
        header("Location:".base_url);
    }
    
}