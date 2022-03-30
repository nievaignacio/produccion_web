<?php

try{
   
    $error = "Este es un error lanzado";
    throw new Exception($error);

    echo "Esta línea nunca será ejecutada";

} catch(Exception $e){

    echo "Excepción capturada ".$e->getMessage()."\n";

}
