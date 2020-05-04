<?php

namespace GameOfTheGoose;

use GameOfTheGoose\Player\Player;
use GameOfTheGoose\Player\PlayerExistsException;

require 'vendor/autoload.php';

echo "\nGame of the Goose\n\n";

$board = Board::withTileCount(10);
$game = new Game($board);

$input = new Input();
$output = new Output();
$commandConsole = new CommandConsole($input, $output);

while ($choice = trim($commandConsole->mainMenu())) {
    switch ($choice) {
        case 1:
            $playerName = $commandConsole->insertPlayer();
            $player = new Player($playerName);

            try {
                $game->addPlayer($player);
            } catch (PlayerExistsException $exception) {
                $commandConsole->printError($exception->getMessage());
            }
            break;

        case 2:
            $commandConsole->displayPlayerList($game->playerList());
            break;

        default:
            // exit
    }
}
