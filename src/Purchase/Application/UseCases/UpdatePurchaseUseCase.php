<?php

namespace Src\Purchase\Application\UseCases;

use Src\Purchase\Application\DTO\UpdatePurchaseDTO;
use Src\Purchase\Domain\Exceptions\FailToUpdatePurchaseException;
use Src\Purchase\Domain\Repositories\PurchaseRepository;
use Src\Purchase\Domain\ValueObjects\PurchaseForUpdate;

readonly class UpdatePurchaseUseCase
{
    public function __construct(
        private UpdatePurchaseDTO $dto,
        private PurchaseRepository $repository
    ) {}

    /**
     * @throws FailToUpdatePurchaseException
     */
    public function __invoke(): void
    {
        if (! $this->repository->update(
            new PurchaseForUpdate(
                $this->dto->getPurchaseId(),
                $this->dto->getStatus()
            )
        )) {
            throw new FailToUpdatePurchaseException();
        }
    }
}
