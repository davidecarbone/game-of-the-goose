<?php

namespace GameOfTheGoose;

class Board
{
    /* @var Tile[] */
    private $tiles;

    /**
     * @param int $tileCount
     */
    public function __construct($tileCount)
    {
        $this->tiles = array();

        for ($i = 1; $i <= $tileCount; $i++) {
            $this->tiles[$i] = new Tile($i);
        }
    }

    /**
     * Check whether a tile position exists.
     *
     * @param int $tilePosition
     *
     * @return bool
     */
    public function tileExists($tilePosition)
    {
        return isset($this->tiles[$tilePosition]);
    }
}