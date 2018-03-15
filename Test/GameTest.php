<?php

namespace GameOfTheGoose\Test;

use PHPUnit\Framework\TestCase;
use GameOfTheGoose\Board;
use GameOfTheGoose\Game;
use GameOfTheGoose\Player;
use GameOfTheGoose\PlayerList;
use GameOfTheGoose\Exception\PlayerExistsException;

class GameTest extends TestCase
{
    /* @var Game $game */
    private $game;

    public function setUp()
    {
        parent::setUp();

        $playerList = new PlayerList();
        $board = new Board(10);
        $this->game = new Game($playerList, $board);
    }

    public function testAddPlayer()
    {
        $this->game->addPlayer(new Player('Davide'));

        $this->assertEquals(1, $this->game->getPlayersCount());
    }

    public function testAddTwoPlayers()
    {
        $this->game->addPlayer(new Player('Davide'));
        $this->game->addPlayer(new Player('Loris'));

        $this->assertEquals(2, $this->game->getPlayersCount());
    }

    /**
     * @expectedException \GameOfTheGoose\Exception\PlayerExistsException
     */
    public function testPlayerWithExistingNameMustNotBeAddable()
    {
        $this->game->addPlayer(new Player('Davide'));
        $this->game->addPlayer(new Player('Davide'));

        $this->assertEquals(2, $this->game->getPlayersCount());
    }
}
