<?php

namespace GameOfTheGoose;

class Tile
{
    private $position;

    /**
     * @param int $position
     */
    public function __construct($position)
    {
        $this->position = $position;
    }
}
