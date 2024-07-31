<?php

namespace Src\Purchase\Application\UseCases;

use Src\Purchase\Application\DTO\FindPurchaseDTO;
use Src\Purchase\Domain\Entities\PurchaseEntity;
use Src\Purchase\Domain\Exceptions\PurchaseNotFound;
use Src\Purchase\Domain\Repositories\PurchaseRepository;

readonly class FindPurchaseUseCase
{
    public function __construct(
        private FindPurchaseDTO $dto,
        private PurchaseRepository $repository
    ) {}

    /**
     * @throws PurchaseNotFound
     */
    public function __invoke(): PurchaseEntity
    {
        $purchase = $this->repository->find(
            $this->dto->getPurchaseUuid()
        );

        if (! $purchase) {
            throw new PurchaseNotFound();
        }

        return $purchase;
    }
}
