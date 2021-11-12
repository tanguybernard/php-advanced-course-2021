<?php

namespace Course\App\Controller;

use Course\App\Manager\MovieManagerInterface;

class MovieController{

    public function __construct(public MovieManagerInterface $movieManager)
    {
    }

    public function processRequest(string $requestMethod)
    {
        switch($requestMethod)
        {
            case 'GET':
                header('Content-type: application/json');

                echo json_encode($this->movieManager->findAll());
                break;
            case 'POST':
                $this->createMovie();
                header("HTTP/1.1 201 Created");

                break;
            default:
                // Requête invalide
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }

    private function createMovie() : void
    {

        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        $this->movieManager->create($input);

    }

}