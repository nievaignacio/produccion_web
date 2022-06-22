<?php

namespace Models;

use core\DbCollection;

class ItemCompra extends DbCollection{

    public $id_ordenCompra;
    public $id_producto;
    public $cantidad;

    public function __construct($id_ordenCompra, $id_producto, $cantidad)
    {
        //$this->id=null;
        $this->id_ordenCompra = $id_ordenCompra;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;

        //var_dump($this);
    }

}
	