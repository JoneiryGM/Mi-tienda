<?php
require_once 'config/DataBase.php';

class CategoriaModel
{
    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = DataBase::Connect();
    }

    // getter
    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    // setter
    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getcategorias()
    {
        $query = $this->db->query("SELECT * FROM categoria ORDER BY id DESC");
        return $query;
    }

    public function getOne()
    {
        $categorias = $this->db->query("SELECT * FROM categoria WHERE id={$this->getId()}"); 
        return $categorias->fetch_object();
    }

    public function save()
    {
        $sql = "INSERT INTO categoria VALUES(NULL,'{$this->getNombre()}')";
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