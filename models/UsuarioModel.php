<?php
require_once 'config/DataBase.php';

class UsuarioModel
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $pass;
    private $rol;
    private $imagen;
    private $db;

    public function __construct()
    {
        $this->db = DataBase::Connect();
    }


    // Getter
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getRol(){
        return $this->rol;
    }
    public function getImagen(){
        return $this->imagen;
    }


    // Setter
    public function setId($id){
        $this->id=$id;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }
    public function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    public function setPass($pass){
        $this->pass = $this->db->real_escape_string($pass);
        
    }
    public function setRol($rol){
        $this->rol=$rol;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }


    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPass()}','user',null)";
        $registrar = $this->db->query($sql);  
        $resultado=false;

        if($registrar){
          $resultado=true;
        }else{
            $resultado=false;
        }

        return $resultado;
    }

    public function login()
    {
        $result = false;
        $email_login = $this->email;
        $password_login = $this->pass;

        // comprobacion si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email='$email_login'";
        $login = $this->db->query($sql);
        

        
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();

            // varificar la pass 
            // $verify = password_verify($password_login, $usuario->pass);
            $verify = $password_login;

            if($verify==$usuario->pass)
            {
                $result = $usuario; 
                // var_dump($result->rol);
            }else{
                echo "problema con las credenciales";
            }
        }
        
        return $result;
    }
}