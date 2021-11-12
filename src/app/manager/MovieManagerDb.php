<?php

namespace Course\App\Manager;

class MovieManagerDb implements MovieManagerInterface {

    public function __construct(public $entityManager)
    {
    }

    public function create($movie)
    {

    }

    public function findById($movieId)
    {
         //TODO SELEECT * FROM MOVIE WHERE ID = $movieId
    }

    public function findAll()
    {
        return $this->entityManager->findAll();
    }
}