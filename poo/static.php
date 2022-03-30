<?php

// Metodos y propiedades estaticas

class Prueba{
    
    static $text = "Hola Mundo";
    
    static function getText(){
        return self::$text;
    }
    
}

echo "<br>";
echo Prueba::getText();


?>