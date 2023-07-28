<?php

namespace Tests;

use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testLaunchGame()
    {
        $game = new Game(['--','--','--','--','--','--','--','--','--','--']);
        $this->assertInstanceOf(Game::class, $game);
    }

    public function testFullNullFrame() {
        $game = new Game(['--','--','--','--','--','--','--','--','--','--']);
        $score = $game->score();
        $this->assertEquals(0, $score);
    }

    public function testFrameToScore()
    {
        $game = new Game(['--','1-','1/','x','--','--','--','--','--','--']);
        $this->assertEquals(0, $game->frameToScore(0));
        $this->assertEquals(1, $game->frameToScore(1));
        $this->assertEquals(10, $game->frameToScore(2));
        $this->assertEquals(10, $game->frameToScore(3));
    }

    public function testFirstShootScore()
    {
        $game = new Game(['--','1-','3/','x','--','--','--','--','--','--']);
        $this->assertEquals(0, $game->firstShootScore(0));
        $this->assertEquals(1, $game->firstShootScore(1));
        $this->assertEquals(3, $game->firstShootScore(2));
        $this->assertEquals(10, $game->firstShootScore(3));
    }

    public function testFullStrike()
    {
        $game = new Game(['x','x','x','x','x','x','x','x','x','x','x','x']);
        $score = $game->score();
        $this->assertEquals(300, $score);
    }

    public function testFullSpare()
    {
        $game = new Game(['5/','5/','5/','5/','5/','5/','5/','5/','5/','5/','5']);
        $score = $game->score();
        $this->assertEquals(150, $score);
    }

    public function testClassicScore()
    {
        $game = new Game(['9-','9-','9-','9-','9-','9-','9-','9-','9-','9-']);
        $score = $game->score();
        $this->assertEquals(90, $score);
    }
}
