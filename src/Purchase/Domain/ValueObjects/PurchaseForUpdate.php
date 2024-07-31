<?php

namespace Src\Purchase\Domain\ValueObjects;

use Src\Purchase\Domain\Enums\PurchaseStatusEnum;

readonly class PurchaseForUpdate
{
    public function __construct(
        private int $purchaseId,
        private PurchaseStatusEnum $status
    ) {}

    public function getPurchaseId(): int
    {
        return $this->purchaseId;
    }

    public function getStatus(): PurchaseStatusEnum
    {
        return $this->status;
    }
}
