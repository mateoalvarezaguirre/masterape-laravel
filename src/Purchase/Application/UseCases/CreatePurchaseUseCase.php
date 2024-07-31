<?php

namespace Src\Purchase\Application\UseCases;

use Src\Purchase\Application\DTO\CreatePurchaseDTO;
use Src\Purchase\Domain\Entities\PurchaseEntity;
use Src\Purchase\Domain\Enums\PurchaseStatusEnum;
use Src\Purchase\Domain\Exceptions\FailToCreatePurchaseException;
use Src\Purchase\Domain\Exceptions\InvalidCartDataException;
use Src\Purchase\Domain\Repositories\PurchaseRepository;
use Src\Purchase\Domain\ValueObjects\PurchaseBookList;

readonly class CreatePurchaseUseCase
{
    public function __construct(
        private CreatePurchaseDTO $dto,
        private PurchaseRepository $repository
    ) {}

    /**
     * @throws FailToCreatePurchaseException|InvalidCartDataException
     */
    public function __invoke(): PurchaseEntity
    {
        if (! $this->dto->getCart() || $this->dto->getCart()->isEmpty()) {
            throw new InvalidCartDataException();
        }

        $purchase = new PurchaseEntity(
            uuid: uniqid(),
            userId: $this->dto->getUserId(),
            books: PurchaseBookList::fromCart($this->dto->getCart()),
            status: PurchaseStatusEnum::PAYMENT_PENDING
        );

        $purchase = $this->repository->create($purchase);

        if (! $purchase) {
            throw new FailToCreatePurchaseException();
        }

        return $purchase;
    }
}
