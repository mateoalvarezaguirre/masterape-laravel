<?php

namespace Src\Purchase\Domain\Exceptions;

use Exception;

class InvalidCartDataException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid cart data', 422);
    }
}
