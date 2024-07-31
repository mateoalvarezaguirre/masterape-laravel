<?php

namespace Src\Purchase\Infrastructure\Mappers;

use App\Models\Book;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Src\Purchase\Domain\Entities\Lists\PurchaseEntityList;
use Src\Purchase\Domain\Entities\PurchaseEntity;
use Src\Purchase\Domain\Enums\PurchaseStatusEnum;
use Src\Purchase\Domain\ValueObjects\PurchaseBook;
use Src\Purchase\Domain\ValueObjects\PurchaseBookList;
use Src\Purchase\Domain\ValueObjects\PurchaseDates;

abstract class PurchaseMapper
{
    /**
     * @param Collection<Purchase> $purchases
     * @return PurchaseEntityList
     */
    public static function collectionToList(Collection $purchases): PurchaseEntityList
    {
        $purchaseEntityList = new PurchaseEntityList();

        foreach ($purchases as $purchase) {
            $purchaseEntityList->add(self::modelToEntity($purchase));
        }

        return $purchaseEntityList;
    }

    public static function modelToEntity(Model|Purchase $purchase): PurchaseEntity
    {
        $purchaseEntity = new PurchaseEntity(
            $purchase->uuid,
            $purchase->user_id,
            self::fromRelationToValueObject($purchase->books),
            PurchaseStatusEnum::from($purchase->purchase_status_id),
            new PurchaseDates(
                $purchase->created_at,
                $purchase->updated_at
            )
        );

        $purchaseEntity->setId($purchase->id);

        return $purchaseEntity;
    }

    /**
     * @param Collection<int, Book> $books
     */
    private static function fromRelationToValueObject(Collection $books): PurchaseBookList
    {
        $purchaseBookList = new PurchaseBookList();

        foreach ($books as $book) {
            $purchaseBookList->add(
                new PurchaseBook(
                    $book->id,
                    $book->price,
                    $book->title,
                    $book->cover_image_path,
                    $book->resume
                )
            );
        }

        return $purchaseBookList;
    }
}
