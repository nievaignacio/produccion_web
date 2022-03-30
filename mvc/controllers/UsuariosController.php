<?php

namespace controllers;

use \Models\Usuario as Usuario;

class UsuariosController{


    public function index(){

        
        $usuarios = Usuario::getAll();

        // foreach($usuarios as $usuario){
        //    var_dump($usr);
        // }

        require_once("views/Usuarios/index.php");

    }

}

