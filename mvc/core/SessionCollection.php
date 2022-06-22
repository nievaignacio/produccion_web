<?php

namespace core;

class SessionCollection extends Collection
{ 

	public static function save($obj){
		if(!isset($_SESSION))
           session_start();
		   $_SESSION[self::getCollection()][$obj->id] = $obj;
    }

	public static function update($obj){
		self::save($obj);
	}

	public static function delete($id){
		if(!isset($_SESSION))
           session_start();
		if(isset($_SESSION[self::getCollection()]))
    		unset($_SESSION[self::getCollection()][$id]);
    }

    public static function getAll(){
		if(!isset($_SESSION))
           session_start();
		// if(isset($_SESSION[self::getCollection()]))
		// 	return $_SESSION[self::getCollection()];
		// else
		// 	return [];
		return $_SESSION[self::getCollection()] ?? [];
	}

	public static function getById($id){
		if(!isset($_SESSION))
		session_start();
		// if(isset($_SESSION[self::getCollection()][$id]))
		// 	return $_SESSION[self::getCollection()][$id];
		// else
		// 	return null;
		return $_SESSION[self::getCollection()][$id] ?? null;
	}
	
	public static function destroy(){
		if(!isset($_SESSION))
			session_start();
       	unset($_SESSION[self::getCollection()]);
    }


}
