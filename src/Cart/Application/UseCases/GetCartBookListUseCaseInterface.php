<?php

namespace Src\Cart\Application\UseCases;

use Src\Cart\Domain\ValueObjects\CartBook;
use Src\Cart\Domain\ValueObjects\List\CartBookList;

interface GetCartBookListUseCaseInterface
{
    /**
     * @return CartBookList
     */
    public function get(): CartBookList;
}
