<?php

interface avanzable {
    public function avanzar();
    public function retroceder();
}


class Auto implements avanzable {

    var $modelo;

    public function avanzar(){
        echo "El Auto avanza\n";
    }
    public function retroceder(){
        echo "El Auto va en reversa\n";
    }

}

class Libro implements avanzable {

    var $titulo;
    
    public function avanzar(){
        echo "Avanza pargina\n";
    }
    public function retroceder(){
        echo "Retrocede pagina\n";
    }
}

class Edificio{

    var $pisos;

}


// Solo para ejemplo
function avanzar($obj){

    if($obj instanceof avanzable){
        $obj->avanzar();
    }else{
        echo "Un ".get_class($obj)." no avanza.";
    }
        
}

avanzar(new Auto());
avanzar(new Libro());
avanzar(new Edificio());


?>