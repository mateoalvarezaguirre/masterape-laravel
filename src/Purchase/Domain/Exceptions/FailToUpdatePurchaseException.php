<?php

namespace Src\Purchase\Domain\Exceptions;

class FailToUpdatePurchaseException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Fail to update purchase', 409);
    }
}
