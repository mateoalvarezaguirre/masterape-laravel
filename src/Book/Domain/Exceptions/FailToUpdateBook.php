<?php

namespace Src\Book\Domain\Exceptions;

class FailToUpdateBook extends \Exception
{
    public function __construct()
    {
        parent::__construct('Fail to update book');
    }
}
