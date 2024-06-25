<?php

namespace Src\Book\Domain\Exceptions;

use Illuminate\Http\Response;

class FailToCreateBook extends \Exception
{
    public function __construct()
    {
        parent::__construct('Fail to create book', Response::HTTP_CONFLICT);
    }
}
