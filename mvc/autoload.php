<?php

class Autoload
{

    public static function exec()
    {
        spl_autoload_register(function ($class) {
            $ruta = str_replace("\\", "/", $class) . ".php";
            include_once $ruta;
        });
    }
}
