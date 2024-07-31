<?php

namespace Src\Purchase\Application\DTO;

use Src\Purchase\Domain\Enums\PurchaseStatusEnum;

readonly class UpdatePurchaseDTO
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
