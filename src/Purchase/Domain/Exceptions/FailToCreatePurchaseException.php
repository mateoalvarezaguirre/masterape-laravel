<?php

namespace Src\Purchase\Domain\Exceptions;

class FailToCreatePurchaseException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Fail to create purchase', 409);
    }
}
