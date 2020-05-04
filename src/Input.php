<?php

namespace GameOfTheGoose;

final class Input
{
    public function read()
    {
        return fgets(STDIN);
    }
}
