<?php

namespace Src\Purchase\Domain\ValueObjects;

use Carbon\Carbon;

readonly class PurchaseDates
{
    public function __construct(
        private Carbon $createdAt,
        private Carbon $updatedAt
    ) {}

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
