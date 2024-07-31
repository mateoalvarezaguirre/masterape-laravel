<?php

namespace Src\Purchase\Infrastructure\Repositories;

use App\Models\Purchase;
use Illuminate\Support\Facades\Log;
use Src\Purchase\Domain\Entities\Lists\PurchaseEntityList;
use Src\Purchase\Domain\Entities\PurchaseEntity;
use Src\Purchase\Domain\Repositories\PurchaseRepository;
use Src\Purchase\Domain\ValueObjects\PurchaseForUpdate;
use Src\Purchase\Infrastructure\Mappers\PurchaseMapper;

class PurchaseEloquentRepository implements PurchaseRepository
{
    public function create(PurchaseEntity $purchase): ?PurchaseEntity
    {
        try {

            $newPurchase = Purchase::create([
                'uuid'               => $purchase->getUuid(),
                'user_id'            => $purchase->getUserId(),
                'purchase_status_id' => $purchase->getStatus()->value,
            ]);

            $bookIds = array_map(fn ($purchaseBook) => $purchaseBook->getId(), $purchase->getBooks()->getItems());

            $newPurchase->books()->attach($bookIds);

            $purchase->setId($newPurchase->id);

            return $purchase;

        } catch (\Throwable $throwable) {
            Log::error($throwable);

            return null;
        }
    }

    public function find(string $purchaseUuid): ?PurchaseEntity
    {
        try {

            $purchase = Purchase::with('books')
                ->where('uuid', $purchaseUuid)
                ->first();

            if (! $purchase) {
                return null;
            }

            return PurchaseMapper::modelToEntity($purchase);

        } catch (\Throwable $throwable) {
            Log::error($throwable);

            return null;
        }
    }

    public function getAllByUserId(int $userId): PurchaseEntityList
    {
        try {

            $purchases = Purchase::with('books')
                ->where('user_id', $userId)
                ->orderByDesc('created_at')
                ->get();

            return PurchaseMapper::collectionToList($purchases);

        } catch (\Throwable $throwable) {
            Log::error($throwable);

            return new PurchaseEntityList();
        }
    }

    public function getAll(): PurchaseEntityList
    {
        try {

            $purchases = Purchase::with('books')->orderByDesc('created_at')->get();

            return PurchaseMapper::collectionToList($purchases);

        } catch (\Throwable $throwable) {
            Log::error($throwable);

            return new PurchaseEntityList();
        }
    }

    public function update(PurchaseForUpdate $purchase): bool
    {
        try {

            Purchase::whereId($purchase->getPurchaseId())
                ->update([
                    'purchase_status_id' => $purchase->getStatus()->value,
                ]);

            return true;

        } catch (\Throwable $throwable) {
            Log::error($throwable);

            return false;
        }
    }
}
