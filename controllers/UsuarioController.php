<?php


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
        # code...
    }
}