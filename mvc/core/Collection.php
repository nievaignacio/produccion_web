<?php

namespace core;

abstract class Collection{
    
    public $id = null;

    function __construct($id)
	{  
		$this->id = $id;
	}

    abstract public static function getAll();
     
    abstract public static function getById($id);
     
    abstract public static function save($obj);     

    abstract public static function update($obj);

    abstract public static function delete($id);

    protected static function getCollection(){        

        $explode = explode("\\", get_called_class());
        $name = end($explode);

        return $name;
    }

     
}
