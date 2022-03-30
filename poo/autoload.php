<?php

class Autoload{

public static function run(){
    spl_autoload_register(function($class){
        $ruta = str_replace("\\", "/", $class) . ".php";
        include_once $ruta;
    });
}

}

Autoload::run();

$miClase = new Proyecto\Prueba\MiClase;
$claseDos = new Proyecto\Prueba\ClaseDos;

$miClase->saludar();
$claseDos->saludar();
