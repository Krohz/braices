<?php
//4 parametros
// localhost
//nombre usuario de la base de datos
//es el password el mio es root o ''
//nombre de la base de datos
function conectarDB(): mysqli{
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo "No se pudo conectar";
        exit;
    }
    return $db;
}