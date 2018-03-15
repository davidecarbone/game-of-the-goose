<?php

namespace GameOfTheGoose;

use GameOfTheGoose\Exception\PlayerExistsException;

class Game
{
    /* @var Board */
    private $board;

    /* @var Player[] $players */
    private $players;

    /* @var PlayerList $playerList */
    private $playerList;

    /**
     * @param PlayerList $playerList
     * @param Board $board
     */
    public function __construct(PlayerList $playerList, Board $board)
    {
        $this->playerList = $playerList;
        $this->board = $board;
        $this->players = array();
    }

    /**
     * Get the number of players in game.
     *
     * @return int
     */
    public function getPlayersCount()
    {
        return count($this->players);
    }

    /**
     * Get the current position of all players.
     *
     * @return array
     */
    /*public function getPlayerPositions()
    {
        $playerPositions = array();

        foreach ($this->players as $number => $player) {
            $playerPositions[$number] = $player->currentPosition;
        }

        return $playerPositions;
    }*/

    /**
     * Add a player to the game.
     *
     * @param Player $player
     *
     * @return bool
     * @throws PlayerExistsException
     */
    public function addPlayer(Player $player)
    {
        if ($playerName = $this->playerExists($player)) {
            throw new PlayerExistsException("Giocatore già esistente: " . $playerName);
        }

        $this->players[$this->getPlayersCount()+1] = $player;
        $player->addToList($this->playerList);

        return true;
    }

    /**
     * Check whether a player exists.
     *
     * @param Player $newPlayer
     *
     * @return bool
     */
    private function playerExists(Player $newPlayer)
    {
        foreach ($this->players as $number => $player) {
            if ($newPlayer->isEqualTo($player)) {
                return true;
            }
        }

        return false;
    }
}
