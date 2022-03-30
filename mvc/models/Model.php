<?php

namespace Models;

class Model{


    public static function getAll(){
        $class = "suscriptons";
        $list=[];
      //  echo 'SELECT * from '.$class.'s; ';

        $table = str_replace("Models\\", "", $class)."s";

        echo $table;
        $mdb = \Db::getConnect()->query("SELECT * from $table ;", \PDO::FETCH_CLASS, $class);
        foreach ($mdb as $obj) {
            var_dump($obj);
        
			//$list[]= call_user_func_array(new $class, $obj);
		}


       // $list = $mdb->fetchAll(\PDO::FETCH_CLASS, $class);
        $mdb = null;
        echo $class;
		return $list;
    }


}

