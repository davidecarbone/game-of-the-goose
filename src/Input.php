<?php

namespace GameOfTheGoose;

class Input
{
    public function read()
    {
        return fgets(STDIN);
    }
}
