<?php

namespace Models;

class Carrito extends \core\SessionCollection
{

	public $producto;
    public $cantidad;

    public function __construct($producto, $cantidad)
    {
        parent::__construct($producto->id);
		$this->producto = $producto;
        $this->cantidad = $cantidad;
    }
	

	 //public static $productos = [];

	// public static function save(ItemCompra $item){
	// 	if(!isset($_SESSION))
    //        session_start();
	// 	if(isset($_SESSION['Carrito']))
    //     	Carrito::$productos = $_SESSION['Carrito'];
	// 	if(isset(Carrito::$productos[$item->producto->id]))
	// 		Carrito::$productos[$item->producto->id]->cantidad = $item->cantidad;
	// 	else
	// 		Carrito::$productos[$item->producto->id] = $item;
	// 	$_SESSION['Carrito'] = Carrito::$productos;
    // }

	// public static function delete($key){
	// 	if(!isset($_SESSION))
    //        session_start();
	// 	if(isset($_SESSION['Carrito']))
    //     	Carrito::$productos = $_SESSION['Carrito'];
	// 		unset(Carrito::$productos[$key]);
	// 		$_SESSION['Carrito'] = Carrito::$productos;
    // }

    // public static function getProductos(){
	// 	if(!isset($_SESSION))
    //        session_start();
	// 	if(isset($_SESSION['Carrito']))
	// 		Carrito::$productos = $_SESSION['Carrito'];
    //     return Carrito::$productos;
    
	// }

	// public static function getById($id){
	// 	if(!isset($_SESSION))
	// 	session_start();
	//  if(isset($_SESSION['Carrito']))
	// 	 Carrito::$productos = $_SESSION['Carrito'];
	// 	return Carrito::$productos[$id];
    
	// }
	
	// public static function destroy(){
	// 	session_start();
    //    	session_destroy();
    // }


}
