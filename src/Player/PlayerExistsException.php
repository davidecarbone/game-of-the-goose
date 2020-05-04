<?php

namespace GameOfTheGoose\Player;

use Exception;
use Throwable;

class PlayerExistsException extends Exception
{
	public function __construct($message = "", $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->message = "Giocatore già esistente: $message";
	}
}
