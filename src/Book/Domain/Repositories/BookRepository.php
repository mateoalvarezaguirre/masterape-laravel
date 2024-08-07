<?php

namespace Src\Book\Domain\Repositories;

use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Entities\Lists\BookList;
use Src\Cart\Domain\ValueObjects\List\CartBookList;
use Src\Shared\ValueObjects\Cart;

interface BookRepository
{
    public function create(BookEntity $bookEntity): ?BookEntity;

    public function update(BookEntity $bookEntity): bool;

    public function delete(int $id): void;

    public function findById(int $id): ?BookEntity;

    public function getAll(int $page, int $limit): ?BookList;

    public function getCartBookList(Cart $cart): CartBookList;
}
