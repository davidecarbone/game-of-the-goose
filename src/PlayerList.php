<?php

namespace GameOfTheGoose;

class PlayerList
{
    private $playerNames = array();

    /**
     * @param string $name
     *
     * @return array
     */
    public function addPlayerName($name)
    {
        $this->playerNames[] = $name;

        return $this->playerNames;
    }

    /**
     * @param string $separator
     *
     * @return string
     */
    public function toString($separator)
    {
        return implode($separator, $this->playerNames);
    }
}
