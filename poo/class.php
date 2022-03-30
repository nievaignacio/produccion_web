<?php
// Clase

class Persona {
    
    //Propiedades
    var $nombre;
    var $apellido;
    
    //Metodos
    function __construct($nombre,$apellido){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    function getNombreCompleto(){
        return $this->nombre." ".$this->apellido;
    }
    
    function __destruct(){
        echo "<br>";
        echo "Objeto ".get_class($this)." destruido";
    }    
    
}

// Instanciando objetos

// $persona = new Persona();
// $persona->nombre = "Ignacio"
// $persona->apellido = "Nieva";

// echo $persona->getnombreCompleto();


// Metodo Construntor

$persona = new Persona("Ignaico","Nieva");

echo $persona->getnombreCompleto();


// Herencia

class Alumno extends Persona{
    
    var $notas;

    function getPromedio(){
        return array_sum($this->notas)/count($this->notas);
    }
    
}


$alumno  = new Alumno("Juan","Perez");
$alumno->notas = [10,8,9,5];

echo "<br>";
echo "Alumno: ". $alumno->getNombreCompleto() ." Promedio: ". $alumno->getPromedio();


// Palabra reservada parent

/*
    Princicio DRY: Dont Repeat Yourself 
*/

class Profesor extends Persona{
    
    var $materia;
    
    function __construct($nombre,$apellido,$materia){
        parent::__construct($nombre,$apellido); 
        $this->materia = $materia;
    }
    
}

$profesor = new Profesor("Ignaico","Nieva","Produccion Web");

echo "<br>";
echo "Profesor: ". $profesor->getNombreCompleto() ." Materia: ". $profesor->materia;


//Metodo destructor...