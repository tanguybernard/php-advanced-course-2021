<?php declare(strict_types=1);

use Course\App\Tennis\Game;
use PHPUnit\Framework\TestCase;

final class TennisTest extends TestCase
{
    public function testShouldReturnLoveLoveWhenInitGame(): void
    {
        $game = new Game();
        $this->assertEquals('Love - Love', $game->printScore());
    }

    public function testShouldReturn15LoveWhenPlayer1Scored(): void
    {
        $game = new Game();
        $game->playerOneScored();
        $this->assertEquals('15 - Love', $game->printScore());
    }

}
