<?php


class ProductosModel
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
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
    public function getCategoria_id(){
        return $this->categoria_id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getOferta(){
        return $this->oferta;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getImagen(){
        return $this->imagen;
    }


    // Setter
    public function setId($id){
        $this->id = $id;
    }
    public function setCategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    public function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }
    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }
    public function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);;
    }
    public function setFecha($fecha){
        $this->fecha = $this->db->real_escape_string($fecha);
    }
    public function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }


    public function getAll()
    {
        $sql = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $sql;
    }

 
}