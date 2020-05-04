<?php

namespace GameOfTheGoose\Player;

use Exception;
use GameOfTheGoose\Tile\TileNotFoundException;
use GameOfTheGoose\PlayerList;

final class Player
{
    /* @var string */
    private $name;

    /* @var int */
    private $currentPosition;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->currentPosition = 1;
    }

    /**
     * @param Player $player
     *
     * @return string | false
     */
    public function isEqualTo(Player $player)
    {
        if ($this->name == $player->name) {
            return $this->name;
        } else {
            return false;
        }
    }

    /**
     * @param PlayerList $playerList
     *
     * @return PlayerList
     */
    public function addToList(PlayerList $playerList)
    {
        $playerList->addPlayerName($this->name);

        return $playerList;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @param Exception $exception
     *
     * @return string
     */
    public function exceptionDescription(Exception $exception)
    {
        return str_replace('%%NAME%%', $this->name, $exception->getMessage());
    }

    /**
     * Move to a given tile position.
     *
     * @param int $tilePosition
     *
     * @return int
     * @throws TileNotFoundException
     */
    /*public function moveTo($tilePosition)
    {
        if (Board::tileExists($tilePosition)) {
            $this->currentPosition = $tilePosition;
            return $this->currentPosition;
        } else {
            throw new TileNotFoundException("Mossa non valida per $this->name: la casella $tilePosition non esiste.");
        }
    }*/
}
