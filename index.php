<?php

//Incluyo los archivos necesarios
require("./controlador/controlador.php");

//Instancio el controlador
$controller = new Controller;

//SE VALIDA SI SE ESCRIBE ALGO DESPUES DE LA RUTA BASE. 
if(isset($_GET['url'])){
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url); 
    if(isset($url[0])){

    //SE CARGA EL METODO DEL CONTROLADOR
    $controller->{$url[0]}();
    }
}else{

    //SE CARGAR LA VISTA
    $controller->index();   
}

