<?php

namespace PhpKoans\koansResources\Exceptions;

use Exception;

class CustomGenericException extends Exception
{
    public function __construct($message = "Some kind of madness")
    {
        parent::__construct($message);
    }
}
