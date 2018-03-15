<?php

namespace GameOfTheGoose;

use GameOfTheGoose\Exception\PlayerExistsException;
use GameOfTheGoose\Exception\TileNotFoundException;

require 'vendor/autoload.php';

echo "\nGame of the Goose\n\n";

// Create game and board
$playerList = new PlayerList();
$board = new Board(10);
$game = new Game($playerList, $board);

// Add players
try {
    $player1 = new Player('Davide');
    $player2 = new Player('Loris');
    addPlayer($game, $player1, $playerList);
    addPlayer($game, $player2, $playerList);
} catch (PlayerExistsException $e) {
    System::broadCastMessage($e->getMessage());
}

echo "List of players:\n";
echo $playerList->toString("\n");
echo "\n";

// Move players
/*try {
    $player1->moveTo(3);
} catch (TileNotFoundException $e) {
    System::broadCastMessage($e->getMessage());
}*/




/**
 * @param Game   $game
 * @param Player $player
 * @param PlayerList $playerList
 */
function addPlayer(Game $game, Player $player, PlayerList $playerList)
{
    if ($game->addPlayer($player)) {
        System::broadCastMessage('Giocatori: ' . $playerList->toString(', '));
    }
}

function movePlayer(Player $player, $position)
{
    $player->moveTo($position);
    System::broadCastMessage("");
}