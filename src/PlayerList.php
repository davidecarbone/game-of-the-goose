<?php

namespace GameOfTheGoose;

final class PlayerList
{
    private $playerNames = [];

    /**
     * @param string $name
     *
     * @return array
     */
    public function addPlayerName(string $name): array
    {
        $this->playerNames[] = $name;

        return $this->playerNames;
    }

    /**
     * @param string $separator
     *
     * @return string
     */
    public function toList(string $separator): string
    {
        return implode($separator, $this->playerNames);
    }
}
