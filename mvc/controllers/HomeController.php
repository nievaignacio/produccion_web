<?php

namespace controllers;

use core\Controller;
use \models\Producto;
use \models\Carrito;
use \Views\Layout;


class HomeController extends Controller{

    public function index(){

        $titulo = "Nuestros Productos";

        //require_once("./views/Home/index.php");

       // $context['productos'] = Producto::getAll();        
       $this->render('Templates\Layout','/home/index',["titulo"=>$titulo]);

    }

}

?>