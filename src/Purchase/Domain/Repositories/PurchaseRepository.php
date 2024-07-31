<?php

namespace Src\Purchase\Domain\Repositories;

use Src\Purchase\Domain\Entities\Lists\PurchaseEntityList;
use Src\Purchase\Domain\Entities\PurchaseEntity;
use Src\Purchase\Domain\ValueObjects\PurchaseForUpdate;

interface PurchaseRepository
{
    public function create(PurchaseEntity $purchase): ?PurchaseEntity;

    public function find(string $purchaseUuid): ?PurchaseEntity;

    public function getAllByUserId(int $userId): PurchaseEntityList;

    public function getAll(): PurchaseEntityList;

    public function update(PurchaseForUpdate $purchase): bool;
}
