<?php
// clases abstractas

abstract class Figura{

    public $lados;

    //metodo concreto
    public function getLados(){
        return $this->lados;
    }

   //metodo abstracto
    abstract public function getArea();

}

class Rectangulo extends Figura{

    public $base;
    public $altura;
    
    public function __construct($base,$altura){
        $this->base = $base;
        $this->altura = $altura;
        $this->lados = 4;
    }

    public function getArea(){
        return $this->base * $this->altura;
    }

}


class Triangulo extends Figura{

    public $base;
    public $altura;
    
    public function __construct($base,$altura){
        $this->base = $base;
        $this->altura = $altura;
        $this->lados = 3;
    }

    public function getArea(){
        return ($this->base * $this->altura)/2;
    }

}


$rectangulo = new Rectangulo(4,3);
echo "<p>Cantidad de lados: ". $rectangulo->getLados()."</p>";
echo "<p>Area: ".$rectangulo->getArea()."</p>";

$triangulo = new Triangulo(4,3);
echo "<p>Cantidad de lados: ". $triangulo->getLados()."</p>";
echo "<p>Area: ".$triangulo->getArea()."</p>";




?>