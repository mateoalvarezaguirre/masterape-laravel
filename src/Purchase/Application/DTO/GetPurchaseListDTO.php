<?php

namespace Src\Purchase\Application\DTO;

readonly class GetPurchaseListDTO
{
    public function __construct(
        private ?int $userId = null
    ) {}

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}
