<?php

namespace Src\Purchase\Domain\ValueObjects;

use Src\Shared\ValueObjects\Cart;

class PurchaseBookList
{
    /**
     * @var array<PurchaseBook>
     */
    private array $items;

    public function __construct(
        array $items = []
    ) {
        $this->items = $items;
    }

    public function add(PurchaseBook $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return array<PurchaseBook>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalPrice(): float
    {
        return array_reduce($this->items, fn ($carry, $item) => $carry + $item->getPrice(), 0);
    }

    public static function fromCart(Cart $cart): self
    {
        $books = $cart->getList();

        $purchaseBookList = new self();

        foreach ($books as $bookId) {
            $purchaseBookList->add(new PurchaseBook($bookId));
        }

        return $purchaseBookList;
    }
}
