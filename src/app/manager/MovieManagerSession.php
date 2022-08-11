<?php
namespace Course\App\Manager;
session_start();

class MovieManagerSession implements MovieManagerInterface {

    public function create($movie)
    {
        $_SESSION['movie'][] = $movie;
    }

    public function findById($movieId)
    {
         $key = array_search($movieId, array_column($_SESSION['movie'], 'id'));
         return $_SESSION['movie'][$key];
    }

    public function findAll()
    {
        return $_SESSION['movie'] ?? [];
    }
}