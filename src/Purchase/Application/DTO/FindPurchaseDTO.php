<?php

namespace Src\Purchase\Application\DTO;

readonly class FindPurchaseDTO
{
    public function __construct(
        private string $purchaseUuid
    ) {}

    public function getPurchaseUuid(): string
    {
        return $this->purchaseUuid;
    }
}
