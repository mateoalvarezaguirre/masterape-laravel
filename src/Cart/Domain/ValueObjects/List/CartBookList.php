<?php

namespace Src\Cart\Domain\ValueObjects\List;

use Src\Cart\Domain\ValueObjects\CartBook;

class CartBookList
{
    private array $items;

    /**
     * @param array<CartBook> $items
     */
    public function __construct(
        array $items = []
    ) {
        $this->items = $items;
    }

    public function add(CartBook $book): void
    {
        $this->items[] = $book;
    }

    public function toArray(): array
    {
        return array_map(fn (CartBook $book) => $book->toArray(), $this->items);
    }

    public function toObject(): array
    {
        return array_map(fn (CartBook $book) => (object) $book->toArray(), $this->items);
    }
}
