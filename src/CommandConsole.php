<?php

namespace GameOfTheGoose;

class CommandConsole
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

    public function choose()
    {
        $this->output->printMessage("Scegli operazione: ");
        $this->output->printMessage("1: Inserisci nuovo giocatore");
        $this->output->printMessage("2: Lista dei giocatori");

        return $this->input->read();
    }

    /**
     */
    public function insertPlayer()
    {
        $this->output->printMessage("Nome giocatore: ");

        return trim($this->input->read());
    }

    /**
     * @param PlayerList $playerList
     */
    public function displayPlayerList(PlayerList $playerList)
    {
        $this->output->printMessage("Lista dei giocatori:");
        $this->output->printMessage($playerList->toString(PHP_EOL));
    }

    /**
     * @param $message
     */
    public function printError($message)
    {
        $this->output->printMessage($message);
    }
}
