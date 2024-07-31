<?php

namespace Src\Purchase\Domain\Entities\Lists;

use Src\Purchase\Domain\Entities\PurchaseEntity;

class PurchaseEntityList
{
    /**
     * @var array<PurchaseEntity>
     */
    private array $items;

    public function __construct(
        array $items = []
    ) {
        $this->items = $items;
    }

    public function add(PurchaseEntity $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return PurchaseEntity[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function toObject(): array
    {
        return array_map(fn ($item) => $item->toObject(), $this->items);
    }
}
