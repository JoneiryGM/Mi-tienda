<?php

function controllers_autoloader($className){
    require_once 'controllers/'.$className.'.php';
}


spl_autoload_register('controllers_autoloader');