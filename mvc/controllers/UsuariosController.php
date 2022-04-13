<?php

namespace controllers;

use \models\Usuario as Usuario;

class UsuariosController{

    public function index(){

        $usuarios = Usuario::getAll();    
        
        require_once("views/Usuarios/index.php");

    }

    public function agregar(){

        if(!$_POST){
            require_once("views/Usuarios/agregar.php");
        }else{
            $usuario= new Usuario(null,$_POST['password'],$_POST['name'],$_POST['email']);
			Usuario::save($usuario);
            header("Location: ?c=usuarios");
        }
        
    }

    public function eliminar(){

        if($_GET['id']){
			Usuario::delete($_GET['id']);        
        }

        header("Location: ?c=usuarios");
    }
        


}

