<?php

namespace controllers;

use \Models\Usuario;
use core\Auth;

class UsuariosController
{

    public function index()
    {
        $usuarios = Usuario::getAll();

        \Render::html('Templates\adminLayout', '/usuarios/index', ["usuarios" => $usuarios]);
    }



    public function login()
    {

        if (!$_POST) {
            require_once("./views/usuarios/login.php");
        } else {

            $usuario = Usuario::authenticate($_POST['email'], $_POST['password']);

            if ($usuario) {
                Auth::login($usuario);
                header("Location: " . BASE_URL . "/admin");
            } else {
                echo 'Usuario o contraseña incorrectos.';
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        header("Location: " . BASE_URL . "/admin");
    }



    public function agregar()
    {

        if (!$_POST) {
            \Render::html('Templates\AdminLayout', 'usuarios/agregar', []);
        } else {

            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $hash);
            Usuario::save($usuario);
            header("Location: " . BASE_URL . "/admin/usuarios");
        }
    }


}
