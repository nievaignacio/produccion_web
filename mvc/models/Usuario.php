<?php

namespace Models;

class Usuario
{
	//atributos
	public $id;
	public $password;
	public $name;
	public $email;

	//constructor de la clase
	function __construct($id, $password, $name, $email)
	{
		$this->id=$id;
		$this->password=$password;
		$this->name=$name;
		$this->email=$email;
	}

	//función para obtener todos los usuarios
	public static function getAll(){
		$listaUsuarios =[];
		$db=\Db::getConnect(); 
		$sql=$db->query('SELECT * FROM usuarios');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $usuario) {
			$listaUsuarios[]= new Usuario($usuario['id'],$usuario['password'], $usuario['name'],$usuario['email']);
		}
		return $listaUsuarios;
	}

	//la función para registrar un usuario
	public static function save($usuario){
			$db=\Db::getConnect();
			$insert=$db->prepare('INSERT INTO USUARIOS VALUES(NULL,:password,:name, :email)');
			$insert->bindValue('password',$usuario->password);
			$insert->bindValue('name',$usuario->name);
			$insert->bindValue('email',$usuario->email);
			$insert->execute();
		}

	//la función para actualizar 
	public static function update($usuario){
		$db=\Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET password=:password, name=:name, email=:email WHERE id=:id');
		$update->bindValue('id',$usuario->id);
		$update->bindValue('password',$usuario->password);
		$update->bindValue('name',$usuario->name);
		$update->bindValue('email',$usuario->email);
		$update->execute();
	}

	// la función para eliminar por el id
	public static function delete($id){
		$db=\Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuarios WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

	//la función para obtener un usuario por el id
	public static function getById($id){
		//buscar
		$db=\Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['id'],$usuarioDb['password'],$usuarioDb['name'],$usuarioDb['email']);
		return $usuario;
	}
}
