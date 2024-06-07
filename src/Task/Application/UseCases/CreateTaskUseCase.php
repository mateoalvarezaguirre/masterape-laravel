<?php

namespace Src\Task\Application\UseCases;

use Src\Task\Application\DTO\CreateTaskDTO;
use Src\Task\Domain\Entities\TaskEntity;
use Src\Task\Domain\Repositories\TaskRepository;

readonly class CreateTaskUseCase
{
    public function __construct(
        private CreateTaskDTO $dto,
        private TaskRepository $repository
    ) {}

    public function __invoke(): void
    {
        $this->repository->createTask(
            TaskEntity::toCreate(
                $this->dto->getTitle(),
                $this->dto->getDescription(),
                $this->dto->isDone(),
                $this->dto->getUserId()
            )
        );
    }
}
