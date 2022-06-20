<?php

namespace core;

class ExceptionHandler
{

    public static function run()
    {
        set_exception_handler(function($e)
        {
            echo "Ocurrio un error en el servidor. Error 500";
            die();
        });
    }
}

?>
