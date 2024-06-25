<?php

namespace Src\Book\Domain\Exceptions;

class FailToDeleteBook extends \Exception
{
    public function __construct()
    {
        parent::__construct('Fail to delete book');
    }
}
