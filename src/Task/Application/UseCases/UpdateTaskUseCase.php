<?php

namespace Src\Task\Application\UseCases;

use Src\Task\Application\DTO\UpdateTaskDTO;
use Src\Task\Domain\Entities\TaskEntity;
use Src\Task\Domain\Repositories\TaskRepository;

readonly class UpdateTaskUseCase
{
    public function __construct(
        private UpdateTaskDTO $dto,
        private TaskRepository $repository
    ) {}

    public function __invoke(): void
    {
        $this->repository->updateTask(
            new TaskEntity(
                $this->dto->getId(),
                $this->dto->getTitle(),
                $this->dto->getDescription(),
                $this->dto->isDone(),
                0
            )
        );
    }
}
