<?php

require_once("autoload.php");
Autoload::exec();

// if(isset($_GET['c'])){
//     $controller = "controllers\\".ucwords($_GET['c'])."Controller";
//     if(isset($_GET['a'])){
//         $action = $_GET['a'];
//         (new $controller)->$action();
//     }else{
//         (new $controller)->index();
//     }

// } else {
//     (new controllers\UsuariosController)->index();
// }

$uri = explode('/', $_SERVER['REQUEST_URI']);

print_r($uri[3]);

if($uri[3]){
    $controller = "controllers\\".ucwords($uri[3])."Controller";
    if(class_exists($controller)) 
    if(isset($uri[4])){
        $action = $uri[4];
        (new $controller)->$action();
    }else{
        (new $controller)->index();
    }
    else print "404";
} else {
    (new controllers\UsuariosController)->index();
}