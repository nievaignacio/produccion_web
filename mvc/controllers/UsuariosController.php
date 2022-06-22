<?php

namespace controllers;

use \Models\Usuario;
use core\Auth;
use core\Controller;
use Models\OrdenCompra;

class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios = Usuario::getAll();

        $this->render('Templates\adminLayout', '/usuarios/index', ["usuarios" => $usuarios]);
    }



    public function login()
    {

        if (!$_POST) {
            require_once("./views/usuarios/login.php");
        } else {

            $usuario = Usuario::authenticate($_POST['email'], $_POST['password']);

            if ($usuario) {
                Auth::login($usuario);

                 if($usuario->rol == "Administrador")   
                    $this->redirect("/admin");
                else
                    $this->redirect("/usuarios/perfil/".$usuario->id);
            
            
            } else {
                echo 'Usuario o contraseña incorrectos.';
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect("/");
    }


    public function boton(){

        $usuario = Auth::getUser();

        require_once("views/usuarios/boton.php");
    }


    public function agregar()
    {

        if (!$_POST) {
            $this->render('Templates\AdminLayout', 'usuarios/agregar', []);
        } else {

            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $hash, 'Administrador');
            Usuario::save($usuario);
            $this->redirect("/admin/usuarios");
        }
    }


    public function registro()
    {
        if (!$_POST) {
            $this->render('Templates\Layout', 'usuarios/agregar', []);
        } else {

            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $hash, 'Cliente');
            $usuarioNuevo = Usuario::save($usuario);
            
            Auth::login($usuarioNuevo);
           
            $this->redirect("/usuarios/perfil/".$usuarioNuevo->id);
        }
    }


    public function perfil($id){

        $usuario = Usuario::getById($id);
        $compras = OrdenCompra::getBy('id_usuario',$id);
        $this->render('Templates\Layout', 'usuarios/perfil', ['usuario'=>$usuario, 'compras'=>$compras]);

    }


}
