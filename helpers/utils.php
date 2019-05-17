<?php

class utils
{
    public static function deleteSession($nameSession)
    {
        if(isset($_SESSION[$nameSession]))
        {
            $_SESSION[$nameSession] = null;
             unset($_SESSION[$nameSession]);
        }
        return $nameSession;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin']))
        {
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias()
    {
        require_once 'models/CategoriaModel.php';
        $categoria = new CategoriaModel();
        $getAll = $categoria->getcategorias();

        return $getAll;
    }
}