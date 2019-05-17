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
        $this->nombre = $nombre;
    }

    public function getcategorias()
    {
        $query = $this->db->query("SELECT * FROM categoria");
        return $query;
    }
}