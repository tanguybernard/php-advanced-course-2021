<?php

namespace Course\App\Manager;

interface MovieManagerInterface {
    public function create($movie);
    public function findById($movieId);
    public function findAll();
}
