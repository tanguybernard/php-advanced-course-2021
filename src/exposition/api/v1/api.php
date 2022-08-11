<?php

use Course\App\Manager\MovieManagerSession;
use Course\App\Controller\MovieController;

require_once "../../../vendor/autoload.php";

const FILM_CONTROLLER = 'film_controller';
const ACTOR_CONTROLLER = 'actor_controller';

$request_method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri); //['', 'api', 'v1', 'movies', '13']

$serviceName = '';

if(count($uri)>=4){
    //var_dump($uri[3]);
    if($uri[3] === 'actor'){
        $serviceName = ACTOR_CONTROLLER;
    }
    elseif ($uri[3] === 'movies'){
        $serviceName = FILM_CONTROLLER;
    }
    else{
        header("HTTP/1.0 404 Not found");
        exit();
    }
}
else {
    header("HTTP/1.0 404 Not found");
    exit();
}
if($serviceName === FILM_CONTROLLER){
    $controller = new MovieController(new MovieManagerSession());
    $controller->processRequest($request_method);
}

//https://code.tutsplus.com/tutorials/how-to-build-a-simple-rest-api-in-php--cms-37000