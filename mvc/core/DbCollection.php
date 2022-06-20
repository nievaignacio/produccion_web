<?php

namespace core;

class DBCollection extends Collection{
    

    private static function getTable(){        

        $table = self::getCollection()."s";

        return $table;
    }

    private static function getColumns($obj){
        
        $vars = get_object_vars($obj);
        $columns = implode(",:", array_keys($vars));
    
        return $columns;

    }

    public static function getAll(){
        $db = Db::getConnect();
        $query=$db->query("SELECT * FROM " . self::getTable() . " ORDER BY id");
          
        while ($row = $query->fetch(\PDO::FETCH_OBJ)) {
           $resultSet[]=$row;
        }
         
        return $resultSet;
    }
     
    public static function getById($id){
        $db = Db::getConnect();
        $query=$db->query("SELECT * FROM ".self::getTable()." WHERE id=$id");
 
        if($row = $query->fetch(\PDO::FETCH_OBJ)) {
           $resultSet=$row;
        }
         
        return $resultSet;
    }
     
    public static  function getBy($column,$value){
        $db = Db::getConnect();
        $query=$db->query("SELECT * FROM ".self::getTable()." WHERE $column='$value'");
 
        while($row = $query->fetch(\PDO::FETCH_OBJ)) {
           $resultSet[]=$row;
        }
         
        return $resultSet;
    }

    public static function save($obj)
	{
        $columns = self::getColumns($obj);

        //var_dump($columns);

		$db = Db::getConnect();
		$insert = $db->prepare('INSERT INTO '.self::getTable()." VALUES (:$columns) ");
		$insert->execute((array) $obj);
	}
     

    public static function update($obj)
	{
        $columns = self::getColumns($obj);

		$db = Db::getConnect();
		$insert = $db->prepare('REPLACE INTO '.self::getTable()." VALUES (:$columns) ");
		$insert->execute((array) $obj);
	}    


    public static  function delete($id){
        $db = Db::getConnect();
        $query=$db->query("DELETE FROM ".self::getTable()." WHERE id=$id");
        return $query;
    }
     
     

     
}
?>
