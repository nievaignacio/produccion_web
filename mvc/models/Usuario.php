<?php

namespace Models;

class Usuario
{
	public $id;
	public $password;
	public $name;
	public $email;

	function __construct($id, $password, $name, $email)
	{
		$this->id=$id;
		$this->password=$password;
		$this->name=$name;
		$this->email=$email;
	}

	public static function getAll(){
		$listaUsuarios =[];
		$db=\Db::getConnect(); 
		$stmt=$db->query('SELECT * FROM usuarios ORDER BY id');

		foreach ($stmt->fetchAll() as $usuario) {
			$listaUsuarios[]= new Usuario($usuario['id'],$usuario['password'], $usuario['name'],$usuario['email']);
		}

		// while($usuario = $stmt->fetch(\PDO::FETCH_OBJ)){
		// 	$listaUsuarios[]= $usuario;
		// }

		return $listaUsuarios; 
	}

	public static function save($usuario){
			$db=\Db::getConnect();
			//$insert=$db->prepare('INSERT INTO USUARIOS (password, name, email) VALUES(:password,:name, :email)');
			$insert=$db->prepare('INSERT INTO USUARIOS VALUES(:id,:password,:name, :email)');
			// $insert->bindValue('password',$usuario->password);
			// $insert->bindValue('name',$usuario->name);
			// $insert->bindValue('email',$usuario->email);
			$insert->execute((array) $usuario); // supone que los atributos coinciden con los campos
		}


	public static function update($usuario){
		$db=\Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET password=:password, name=:name, email=:email WHERE id=:id');
		$update->bindValue('id',$usuario->id);
		$update->bindValue('password',$usuario->password);
		$update->bindValue('name',$usuario->name);
		$update->bindValue('email',$usuario->email);
		$update->execute();
	}

	public static function delete($id){
		$db=\Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuarios WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}


	public static function getById($id){
		$db=\Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['id'],$usuarioDb['password'],$usuarioDb['name'],$usuarioDb['email']);
		return $usuario;
	}
}
