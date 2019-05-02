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
}