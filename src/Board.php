<?php

namespace GameOfTheGoose;

use GameOfTheGoose\Tile\Tile;

final class Board
{
    /* @var Tile[] */
    private $tiles;

    public static function withTileCount(int $tileCount): self
    {
	    $board = new self();

	    for ($i = 1; $i <= $tileCount; $i++) {
		    $board->tiles[$i] = new Tile($i);
	    }

	    return $board;
    }

    private function __construct()
    {
        $this->tiles = array();
    }

    /**
     * Check whether a tile position exists.
     *
     * @param int $tilePosition
     *
     * @return bool
     */
    public function tileExists(int $tilePosition)
    {
        return isset($this->tiles[$tilePosition]);
    }
}