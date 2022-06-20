<?php

namespace controllers;

use \models\Producto;
use \models\Carrito;
use \Views\Layout;


class HomeController{

    public function index(){

        $titulo = "Nuestros Productos";

        //require_once("./views/Home/index.php");

       // $context['productos'] = Producto::getAll();        
       \Render::html('Templates\Layout','/home/index',["titulo"=>$titulo]);

    }

}

?>