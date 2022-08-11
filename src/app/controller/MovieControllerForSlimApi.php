<?php

namespace Course\App\Controller;

use Psr\Http\Message\ResponseInterface as Response;

class MovieControllerForSlimApi{

    public function getMovies(Response $response)
    {


        $data = array('title' => 'Inception', 'date' => 2011);

        $json = file_get_contents('/var/www/html/app/controller/toto.json');
        $data = json_decode($json, TRUE);
        $json = json_encode($data);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write($json);
        return $response;
    }
    }