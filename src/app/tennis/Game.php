<?php

namespace Course\App\Tennis;

/*
class Player{
    public function __construct($name, $age, $classement)
    {
    }
}
*/


class Game {

    const SCORE = [0 => 'Love', 1 => '15'];

    private $playerOne = 0;
    private $playerTwo = 0;
    public function printScore():string {
        return self::SCORE[$this->playerOne].' - '.self::SCORE[$this->playerTwo];
    }

    public function playerOneScored()
    {
        $this->playerOne++;

    }

}


