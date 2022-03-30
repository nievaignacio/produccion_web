<?php

require_once("autoload.php");
Autoload::run();

if(isset($_GET['c'])){
    $controller = "controllers\\".ucwords($_GET['c'])."Controller";
    (new $controller)->index();

} else {
    (new controllers\UsuariosController)->index();
}

