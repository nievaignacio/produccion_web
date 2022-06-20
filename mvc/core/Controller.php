<?php

namespace core;

class Controller{

    public function redirect($path){

        header("Location: " . BASE_URL . $path);

    }

    public function render($layout, $view, $context){

        extract($context, EXTR_PREFIX_SAME, "wddx");

        $layout = new $layout($context);
        require_once( "./views/".$view.".php");
    }    


}