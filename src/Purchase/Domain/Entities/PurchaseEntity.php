<?php

namespace Src\Purchase\Domain\Entities;

use Src\Purchase\Domain\Enums\PurchaseStatusEnum;
use Src\Purchase\Domain\ValueObjects\PurchaseBookList;
use Src\Purchase\Domain\ValueObjects\PurchaseDates;

class PurchaseEntity
{
    private int $id;

    public function __construct(
        private readonly string $uuid,
        private readonly int $userId,
        private readonly PurchaseBookList $books,
        private PurchaseStatusEnum $status,
        private readonly ?PurchaseDates $purchaseDates = null
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getBooks(): PurchaseBookList
    {
        return $this->books;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getStatus(): PurchaseStatusEnum
    {
        return $this->status;
    }

    public function setStatus(PurchaseStatusEnum $status): void
    {
        $this->status = $status;
    }

    public function toObject(): object
    {
        return (object) [
            'id'             => $this->id,
            'uuid'           => $this->uuid,
            'user_id'        => $this->userId,
            'books'          => $this->books->getItems(),
            'status'         => $this->status->name,
            'purchase_dates' => (object) [
                'created_at' => $this->purchaseDates?->getCreatedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $this->purchaseDates?->getUpdatedAt()->format('Y-m-d H:i:s'),
            ],
        ];
    }
}
