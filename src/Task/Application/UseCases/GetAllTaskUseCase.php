<?php

namespace Src\Task\Application\UseCases;

use Src\Task\Application\DTO\GetAllTaskDTO;
use Src\Task\Domain\Entities\Lists\TaskEntityList;
use Src\Task\Domain\Repositories\TaskRepository;

readonly class GetAllTaskUseCase
{
    public function __construct(
        private GetAllTaskDTO $dto,
        private TaskRepository $repository
    ) {}

    public function __invoke(): TaskEntityList
    {
        return $this->repository->getTasks(
            $this->dto->getUserId()
        );
    }
}
