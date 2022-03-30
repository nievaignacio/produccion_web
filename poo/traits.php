<?php

trait Saludar {
    function decirHola(){
        return "hola";
    }
}

trait Despedir {
    function decirAdios(){
        return "adios";
    }
}

trait Prueba{
    use Saludar,Despedir;
}

class Comunicacion {
    use Prueba;
}


$comunicacion = new Comunicacion;
echo $comunicacion->decirHola() . ", que tal. ". $comunicacion->decirAdios();


