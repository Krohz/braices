<?php
//4 parametros
// localhost
//nombre usuario
//es el password el mio es root o ''
//base de datos
function conectarDB(): mysqli{
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo "No se pudo conectar";
        exit;
    }
    return $db;
}