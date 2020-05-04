<?php

namespace GameOfTheGoose;

use GameOfTheGoose\Player\Player;
use GameOfTheGoose\Player\PlayerExistsException;

final class Game
{
    /* @var Board */
    private $board;

    /* @var Player[] */
    private $players;

    /* @var PlayerList */
    private $playerList;

    /**
     * @param Board $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
        $this->players = [];
        $this->playerList = new PlayerList();
    }

    /**
     * @return int
     */
    public function playersCount(): int
    {
        return count($this->players);
    }


	/**
	 * @return string
	 */
	public function playerList(): string
	{
		return $this->playerList->toList(PHP_EOL);
	}

    /**
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
     * @param Player $player
     *
     * @throws PlayerExistsException
     */
    public function addPlayer(Player $player)
    {
        if ($this->playerExists($player)) {
            throw new PlayerExistsException((string)$player);
        }

        $this->players[$this->playersCount()] = $player;
        $player->addToList($this->playerList);
    }

    /**
     * @param Player $newPlayer
     *
     * @return bool
     */
    private function playerExists(Player $newPlayer): bool
    {
        foreach ($this->players as $number => $player) {
            if ($newPlayer->isEqualTo($player)) {
                return true;
            }
        }

        return false;
    }

}
