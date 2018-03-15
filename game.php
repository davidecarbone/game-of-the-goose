<?php

namespace GameOfTheGoose;

use GameOfTheGoose\Exception\PlayerExistsException;
use GameOfTheGoose\Exception\TileNotFoundException;

require 'vendor/autoload.php';

echo "\nGame of the Goose\n\n";

// Create game and board
$board = new Board(10);
$playerList = new PlayerList();
$game = new Game($playerList, $board);

$input = new Input();
$output = new Output();
$commandConsole = new CommandConsole($input, $output);

while ($choice = trim($commandConsole->choose())) {
    switch ($choice) {
        case 1:
            $playerName = $commandConsole->insertPlayer();
            $player = new Player($playerName);

            try {
                $game->addPlayer($player);
            } catch (PlayerExistsException $exception) {
                $commandConsole->printError($player->exceptionDescription($exception));
            }
            break;

        case 2:
            $commandConsole->displayPlayerList($playerList);
            break;

        default:
            // exit
    }
}
