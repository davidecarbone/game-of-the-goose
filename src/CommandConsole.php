<?php

namespace GameOfTheGoose;

final class CommandConsole
{
    private $input;
    private $output;

    /**
     * @param Input  $input
     * @param Output $output
     */
    public function __construct(Input $input, Output $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    public function mainMenu()
    {
        $this->output->printMessage("Scegli operazione:");
        $this->output->printMessage("1: Inserisci nuovo giocatore");
        $this->output->printMessage("2: Lista dei giocatori");

        return $this->input->read();
    }

    public function insertPlayer()
    {
        $this->output->printMessage("Nome giocatore:");

        return trim($this->input->read());
    }

    /**
     * @param string $playerList
     */
    public function displayPlayerList(string $playerList)
    {
        $this->output->printMessage("Lista dei giocatori:");
        $this->output->printMessage($playerList);
    }

    /**
     * @param string $message
     */
    public function printError(string $message)
    {
        $this->output->printMessage($message);
    }
}
