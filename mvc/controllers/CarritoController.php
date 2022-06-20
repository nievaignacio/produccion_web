<?php

namespace controllers;

use Models\Carrito;
use Models\ItemCompra;
use Models\Producto;

class CarritoController
{


    public function index()
    {


        $productos = Carrito::getAll();

        $total=0;
        foreach($productos as $producto){
            $total += $producto->producto->precio * $producto->cantidad;
        }

        //var_dump($productos);
       // require_once("./views/Carrito/index.php");

       \Render::html('Templates\layout','Carrito/index', ['productos'=>$productos, 'total'=>$total]);
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

        header("Location: " . BASE_URL . "/carrito");
    }


    public function editar(){

        if (isset($_POST)) {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            $producto = Producto::getById($id);

            $itemCompra = Carrito::getById($id);
            
            if($itemCompra != null){
                $cantidadAnterior = $itemCompra->cantidad;
            }

            $itemCompra->cantidad = $cantidad;            

            Carrito::save($itemCompra);

            $producto->stock = $producto->stock + $cantidadAnterior - $cantidad;

            Producto::update($producto);

        }

        header("Location: " . BASE_URL . "/carrito");

    }


    public function eliminar($id)
    {

      //  $id = $params[0];

        $producto = Producto::getById($id);

        $itemCompra = Carrito::getById($id);
        
        $producto->stock = $producto->stock + $itemCompra->cantidad;

        Producto::update($producto);

        Carrito::delete($id);

        header("Location: " . BASE_URL . "/carrito");
    }

    public function boton()
    {

        $productos = count(Carrito::getALL());

        require_once("./views/Carrito/boton.php");
    }


    public function vaciar()
    {
        Carrito::destroy();

        header("Location: " . BASE_URL . "/carrito");
    }

}
