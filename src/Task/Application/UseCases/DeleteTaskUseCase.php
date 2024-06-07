<?php

namespace Src\Task\Application\UseCases;

use Src\Task\Application\DTO\DeleteTaskDTO;
use Src\Task\Domain\Repositories\TaskRepository;

readonly class DeleteTaskUseCase
{
    public function __construct(
        private DeleteTaskDTO $dto,
        private TaskRepository $taskRepository
    ) {}

    public function __invoke(): void
    {
        $this->taskRepository->delete(
            $this->dto->getTaskId()
        );
    }
}
