<?php

function controller_autoload ($classname){
    include './controllers/'.$classname.'.php';
    // echo "./controllers/.$classname.php";
    // die;
}
spl_autoload_register('controller_autoload');

// function app_autoloader($class){

//     $class_rep = str_replace('\\', '/', $class);
    
//     require_once 'clases/' . $class_rep . '.php';
    
//     }