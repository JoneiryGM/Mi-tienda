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
    public function getApellido(){
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
        $this->nombre=$nombre;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setPass($pass){
        $this->pass=password_hash($this->pass, PASSWORD_BCRYPT, ['cost'=>4]);
        
    }
    public function setRol($rol){
        $this->rol=$rol;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }


    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPass()}','user',null)";
        $registrar = $this->db->query($sql);  
        $resultado=false;

        if($registrar){
          $resultado=true;
        }else{
            $resultado=false;
        }

        return $resultado;
    }
}