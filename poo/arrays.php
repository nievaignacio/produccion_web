<?php

// vectores

$vector = array('juan',1,'miguel');

//$vector = ['juan','pedro','miguel'];

echo $vector[1];

for($i=0; $i < count($vector) ; $i++){ 
    echo $vector[$i]."<br>";
}

foreach ($vector as $valor) {
    echo "$valor<br>";
}

// arreglos asociativos

$vector = ["nombre" => "juan", "apellido"=>"perez"];

//echo $vector["nombre"];

foreach ($vector as $nombre => $valor) {
    echo "$nombre : $valor<br>";
}

// matrices

$matriz[0]["nombre"]="Juan";
$matriz[0]["apellido"]="Perez";

$matriz[1]["nombre"]="Carlos";
$matriz[1]["apellido"]="Gómez";

$matriz[2]["nombre"]="Jose";
$matriz[2]["apellido"]="Rodríguez";

foreach ($matriz as $valor) {
    var_dump($valor);
}



