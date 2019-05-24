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
        if($precio >= 1)
        {
            $this->precio = $this->db->real_escape_string($precio);
        }else{
            return "Numero Mal Insertado :/";
        }
    }
    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }
    public function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }


    public function getAll()
    {
        $sql = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $sql;
    }

    public function getOne()
    {
        $sql = $this->db->query("SELECT * FROM productos WHERE id ={$this->getId()}");
        return $sql->fetch_object();
    }

    public function getRandom($limit)
    {
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function save()
    {
        $sql = "INSERT INTO productos VALUES(NULL,'{$this->getCategoria_id()}','{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}',NULL,CURDATE(),'{$this->getImagen()}')";
        $save = $this->db->query($sql);  
        $resultado=false;

        if($save){
          $resultado=true;
        }

        return $resultado;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $resultado=false;

        if($delete){
          $resultado=true;
        }

        return $resultado;
    }

    public function edit()
    {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}',descripcion='{$this->getDescripcion()}',precio={$this->getPrecio()},stock={$this->getStock()}, imagen='{$this->getImagen()}' WHERE id={$this->getId()} ";
        // if($this->getImagen() != null)
        // {
        //     $sql.=",imagen='{$this->getImagen()}' WHERE id={$this->getId} ";
        // }
        // $sql.=",WHERE id={$this->getId}";
        $update = $this->db->query($sql);
        $resultado=false;

        
        if($update){
          $resultado=true;
        }

        return $resultado;
    }

 
}