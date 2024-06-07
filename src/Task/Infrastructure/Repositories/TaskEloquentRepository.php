<?php

namespace Src\Task\Infrastructure\Repositories;

use App\Models\Task;
use Src\Task\Domain\Entities\Lists\TaskEntityList;
use Src\Task\Domain\Entities\TaskEntity;
use Src\Task\Domain\Repositories\TaskRepository;
use Src\Task\Infrastructure\Mappers\TaskMapper;

class TaskEloquentRepository implements TaskRepository
{
    public function getTasks(int $userId): TaskEntityList
    {
        $tasks = Task::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();

        return TaskMapper::collectionToList(
            $tasks
        );
    }

    public function createTask(TaskEntity $task): TaskEntity
    {
        $taskModel = Task::create([
            'title'       => $task->getTitle(),
            'description' => $task->getDescription(),
            'is_done'     => $task->isDone(),
            'user_id'     => $task->getUserId(),
        ]);

        $task->setId($taskModel->id);

        return $task;
    }

    public function updateTask(TaskEntity $task): void
    {
        Task::whereId($task->getId())->update([
            'title'       => $task->getTitle(),
            'description' => $task->getDescription(),
            'is_done'     => $task->isDone(),
        ]);
    }

    public function delete(int $taskId)
    {
        Task::destroy($taskId);
    }
}
