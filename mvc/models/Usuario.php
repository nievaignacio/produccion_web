<?php

namespace Models;

use core\Db;

class Usuario extends \core\DbCollection
{

	public $nombre;
	public $email;
	public $password;
	public $rol;

	function __construct($id, $nombre, $email, $password, $rol)
	{
		parent::__construct($id);
		$this->nombre = $nombre;
		$this->email = $email;
		$this->password = $password;
		$this->rol = $rol;
	}





	// public static function getAll()
	// {
	// 	$listaUsuarios = [];
	// 	$db = \Db::getConnect();
	// 	$sql = $db->query('SELECT * FROM usuarios');

	// 	foreach ($sql->fetchAll() as $usuario) {
	// 		$listaUsuarios[] = new Usuario($usuario['id'], $usuario['nombre'], $usuario['email'], $usuario['password']);
	// 	}
	// 	return $listaUsuarios;
	// }

	// public static function save($usuario)
	// {
	// 	$db = \Db::getConnect();
	// 	$insert = $db->prepare('INSERT INTO USUARIOS VALUES(NULL,:nombre,:email, :password)');
	// 	$insert->bindValue('nombre', $usuario->nombre);
	// 	$insert->bindValue('email', $usuario->email);
	// 	$insert->bindValue('password', $usuario->password);
	// 	$insert->execute();
	// }

	// public static function update($usuario)
	// {
	// 	$db = \Db::getConnect();
	// 	$update = $db->prepare('UPDATE usuarios SET nombre=:nombre, email=:email, password=:password WHERE id=:id');
	// 	$update->bindValue('id', $usuario->id);
	// 	$update->bindValue('nombre', $usuario->nombre);
	// 	$update->bindValue('email', $usuario->email);
	// 	$update->bindValue('password', $usuario->password);
	// 	$update->execute();
	// }

	// public static function delete($id)
	// {
	// 	$db = \Db::getConnect();
	// 	$delete = $db->prepare('DELETE FROM usuarios WHERE ID=:id');
	// 	$delete->bindValue('id', $id);
	// 	$delete->execute();
	// }

	// public static function getById($id)
	// {
	// 	$db = \Db::getConnect();
	// 	$select = $db->prepare('SELECT * FROM usuarios WHERE ID=:id');
	// 	$select->bindValue('id', $id);
	// 	$select->execute();
	// 	$usuarioDb = $select->fetch();
	// 	$usuario = new Usuario($usuarioDb['id'], $usuarioDb['nombre'], $usuarioDb['email'], $usuarioDb['password']);
	// 	return $usuario;
	// }


	public static function authenticate($email, $password)
	{
		//$hash = password_hash($password, PASSWORD_DEFAULT);

		$db = Db::getConnect();
		$select = $db->prepare('SELECT * FROM usuarios WHERE email=:email');
		$select->bindValue('email', $email);
		//$select->bindValue('password', $hash);
		$select->execute();
		$usuarioDb = $select->fetch();
		if ($usuarioDb  && password_verify($password, $usuarioDb['password']))
			$usuario = new Usuario($usuarioDb['id'], $usuarioDb['nombre'], $usuarioDb['email'], $usuarioDb['password'], $usuarioDb['rol']);
		else
			$usuario = null;

		return $usuario;
	}


}
