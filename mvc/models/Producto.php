<?php

namespace Models;

use core\Db;

class Producto extends \core\DbCollection
{
	public $id;
	public $nombre;
	public $descripcion;
	public $precio;
	public $stock;
	public $imagen;

	function __construct($id, $nombre, $descripcion, $precio, $stock, $imagen)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->precio = $precio;
		$this->stock = $stock;
		$this->imagen = $imagen;
	}


	// public static function getAll()
	// {
	// 	$listaProductos = [];
	// 	$db = \Db::getConnect();
	// 	$stmt = $db->query('SELECT * FROM Productos ORDER BY id	');

	// 	foreach ($stmt->fetchAll() as $producto) {
	// 		$listaProductos[] = new Producto($producto['id'], $producto['nombre'], $producto['descripcion'], $producto['precio'], $producto['stock'], $producto['imagen']);
	// 	}

	// 	// while($Producto = $stmt->fetch(\PDO::FETCH_OBJ)){
	// 	// 	$listaProductos[]= $Producto;
	// 	// }

	// 	return $listaProductos;
	// }

	// public static function save($producto)
	// {
	// 	$db = \Db::getConnect();
	// 	//$insert=$db->prepare('INSERT INTO Productos (nombre, descripcion, precio) VALUES(:nombre,:descripcion, :precio)');
	// 	$insert = $db->prepare('INSERT INTO productos VALUES(:id,:nombre,:descripcion,:precio,:stock,:imagen)');
	// 	// $insert->bindValue('nombre',$Producto->nombre);
	// 	// $insert->bindValue('descripcion',$Producto->descripcion);
	// 	// $insert->bindValue('precio',$Producto->precio);
	// 	$insert->execute((array) $producto); // supone que los atributos coinciden con los campos
	// }


	// public static function update($producto)
	// {
	// 	$db = \Db::getConnect();
	// 	$update = $db->prepare('UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio=:precio, stock=:stock, imagen=:imagen WHERE id=:id');
	// 	$update->bindValue('id', $producto->id);
	// 	$update->bindValue('nombre', $producto->nombre);
	// 	$update->bindValue('descripcion', $producto->descripcion);
	// 	$update->bindValue('precio', $producto->precio);
	// 	$update->bindValue('stock', $producto->stock);
	// 	$update->bindValue('imagen', $producto->imagen);
	// 	$update->execute();
	// }

	// public static function delete($id)
	// {
	// 	$db = \Db::getConnect();
	// 	$delete = $db->prepare('DELETE FROM productos WHERE ID=:id');
	// 	$delete->bindValue('id', $id);
	// 	$delete->execute();
	// }


	// public static function getById($id)
	// {
	// 	$db = \Db::getConnect();
	// 	$select = $db->prepare('SELECT * FROM productos WHERE ID=:id');
	// 	$select->bindValue('id', $id);
	// 	$select->execute();

	// 	$productoDb = $select->fetch();
	// 	$producto = new producto($productoDb['id'], $productoDb['nombre'], $productoDb['descripcion'], $productoDb['precio'], $productoDb['stock'], $productoDb['imagen']);
	// 	return $producto;
	// }



	public static function getByName($nombre)
	{

		$listaProductos = [];

		$db = Db::getConnect();
		$select = $db->prepare(query: 'SELECT * FROM productos WHERE concat(nombre,descripcion) LIKE :n ');
		$select->bindValue(':n', "%$nombre%", \PDO::PARAM_STR);
		$select->execute();

		foreach ($select->fetchAll() as $producto) {
			$listaProductos[] = new Producto($producto['id'], $producto['nombre'], $producto['descripcion'], $producto['precio'], $producto['stock'], $producto['imagen']);
		}

		return $listaProductos;
	}


	public static function getInStock()
	{

		$db = Db::getConnect();
		$select = $db->prepare(query: 'SELECT count(*) as stock FROM productos WHERE stock > 0;');
		$select->execute();

		$result = $select->fetch();

		return $result['stock'];
	}

	public static function getOutStock()
	{

		$db = Db::getConnect();
		$select = $db->prepare(query: 'SELECT count(*) as stock FROM productos WHERE stock = 0;');
		$select->execute();

		$result = $select->fetch();

		return $result['stock'];
	}
}
