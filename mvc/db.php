<?php
class Db
{

    public static function getConnect()
    {
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            return new PDO('mysql:host=localhost;dbname=mvc', 'root', '', $pdo_options);
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
