<?php

namespace GameOfTheGoose\Test;

use PHPUnit\Framework\TestCase;
use GameOfTheGoose\Board;
use GameOfTheGoose\Game;
use GameOfTheGoose\Player\Player;
use GameOfTheGoose\Player\PlayerExistsException;

class GameTest extends TestCase
{
    /* @var Game */
    private $game;

    public function setUp()
    {
        parent::setUp();

        $board = Board::withTileCount(10);
        $this->game = new Game($board);
    }

    public function testAddPlayer()
    {
        $this->game->addPlayer(new Player('Davide'));

        $this->assertEquals(1, $this->game->playersCount());
    }

    public function testAddTwoPlayers()
    {
        $this->game->addPlayer(new Player('Davide'));
        $this->game->addPlayer(new Player('Loris'));

        $this->assertEquals(2, $this->game->playersCount());
    }

    public function testPlayerWithExistingNameMustNotBeAddable()
    {
		$this->setExpectedException(PlayerExistsException::class);

        $this->game->addPlayer(new Player('Davide'));
        $this->game->addPlayer(new Player('Davide'));

        $this->assertEquals(2, $this->game->playersCount());
    }
}
