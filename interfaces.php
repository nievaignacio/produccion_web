<?php

interface desplazable {
    public function avanzar();
    public function retroceder();
}


class Auto implements desplazable {

    var $modelo;

    public function avanzar(){
        echo "El Auto avanza por la calle\n";
    }
    public function retroceder(){
        echo "El Auto retrocede por la calle\n";
    }

}

class Persona implements desplazable {

    var $nombre;
    
    public function avanzar(){
        echo "La Persona avanza por la vereda\n";
    }
    public function retroceder(){
        echo "La Persona retrocede por la vereda\n";
    }
}

class Edificio{

    var $pisos;

}


function avanzar($obj){

    if($obj instanceof desplazable){
        $obj->avanzar();
    }else{
        echo "Un ".get_class($obj)." no avanza.";
    }
        
}

avanzar(new Auto());
avanzar(new Persona());
avanzar(new Edificio());


?>