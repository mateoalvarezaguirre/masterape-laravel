<?php

namespace Src\Purchase\Application\DTO;

use Src\Shared\ValueObjects\Cart;

readonly class CreatePurchaseDTO
{
    public function __construct(
        private int $userId,
        private ?Cart $cart
    ) {}

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }
}
