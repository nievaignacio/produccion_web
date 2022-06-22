<?php

namespace controllers;

use core\Auth;
use core\Controller;
use Models\Carrito;
use Models\OrdenCompra;
use Models\Producto;

class CarritoController extends Controller
{


    public function index()
    {
        $productos = Carrito::getAll();

        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto->producto->precio * $producto->cantidad;
        }

        $this->render('Templates\layout', 'Carrito/index', ['productos' => $productos, 'total' => $total]);
    }

    public function agregar()
    {

        if (isset($_POST)) {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            $producto = Producto::getById($id);
            $item = new Carrito($producto, $cantidad);

            Carrito::save($item);

            $producto->stock = $producto->stock - $cantidad;

            Producto::update($producto);
        }

        $this->redirect("/carrito");
    }


    public function editar()
    {

        if (isset($_POST)) {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            $producto = Producto::getById($id);

            $itemCompra = Carrito::getById($id);

            if ($itemCompra != null) {
                $cantidadAnterior = $itemCompra->cantidad;
            }

            $itemCompra->cantidad = $cantidad;

            Carrito::save($itemCompra);

            $producto->stock = $producto->stock + $cantidadAnterior - $cantidad;

            Producto::update($producto);
        }

        $this->redirect("/carrito");
    }


    public function eliminar($id)
    {

        $producto = Producto::getById($id);

        $itemCompra = Carrito::getById($id);

        $producto->stock = $producto->stock + $itemCompra->cantidad;

        Producto::update($producto);

        Carrito::delete($id);

        $this->redirect("/carrito");
    }

    public function boton()
    {
        $productos = count(Carrito::getALL());
        require_once("./views/Carrito/boton.php");
    }


    public function vaciar()
    {
        Carrito::destroy();
        $this->redirect("/carrito");
    }


    public function checkout()
    {

        $usuario = Auth::getUser();
        $productos = Carrito::getAll();

        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto->producto->precio * $producto->cantidad;
        }

        if ($_POST) {

            $orden = OrdenCompra::save(new OrdenCompra(
                $usuario->id,
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["telefono"],
                $_POST["direccion"],
                $_POST["provincia"],
                $_POST["codigoPostal"],
                $productos
            ));

            Carrito::destroy();

            $this->redirect("/usuarios/perfil/" . $usuario->id);
        }


        $this->render("Templates\layout", "carrito/checkout", ['usuario' => $usuario, 'productos' => $productos, 'total' => $total]);
    }
}
