<?php

namespace GameOfTheGoose;

class CommandConsole
{
    private $input;
    private $output;

    public function __construct(Input $input, Output $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    public function choose()
    {
        $this->output->printMessage("Scegli operazione: ");
        $this->output->printMessage("1: Inserisci nuovo giocatore");
        $this->output->printMessage("2: Stampa giocatori");

        return $this->input->read();
    }

    /**
     */
    public function insertPlayer()
    {
        $this->output->printMessage("Nome giocatore: ");

        return $this->input->read();
    }

    public function printError($message)
    {
        $this->output->printMessage($message);
    }
}
