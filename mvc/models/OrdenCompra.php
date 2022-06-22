<?php

namespace Models;

use core\Db;

class OrdenCompra extends \core\DbCollection
{
    public $id_usuario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $provincia;
    public $codigoPostal;
    public $items = []; // items del modelo carrito

    public function __construct($id_usuario, $nombre, $apellido,  $telefono, $direccion, $provincia, $codigoPostal, $items)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->provincia = $provincia;
        $this->telefono =$telefono;
        $this->codigoPostal = $codigoPostal;
        $this->items = $items;
    }
    

    
	public static function save($orden)
	{
		$db = Db::getConnect();
		$insert = $db->prepare('INSERT INTO ordenCompras VALUES(
            null,
            :id_usuario,
            :nombre,
            :apellido,
            :direccion,
            :provincia,
            :telefono,
            :codigoPostal
            )');
		$insert->bindValue('id_usuario',$orden->id_usuario);
		$insert->bindValue('nombre',$orden->nombre);
		$insert->bindValue('apellido',$orden->apellido);
		$insert->bindValue('direccion',$orden->direccion);
		$insert->bindValue('provincia',$orden->provincia);
		$insert->bindValue('telefono',$orden->telefono);
		$insert->bindValue('codigoPostal',$orden->codigoPostal);

        $insert->execute();

        $ordenNueva = self::getById($db->lastInsertId());
        
        foreach($orden->items as $item){ 
            
            //var_dump($item);

            $i = ItemCompra::save(new ItemCompra(
                $ordenNueva->id,
                $item->producto->id,
                $item->cantidad
            ));

            var_dump($i);
        }

        return $ordenNueva;

	}

    

}