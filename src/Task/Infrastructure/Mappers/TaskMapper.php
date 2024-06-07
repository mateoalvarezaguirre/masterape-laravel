<?php

namespace Src\Task\Infrastructure\Mappers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Src\Task\Domain\Entities\Lists\TaskEntityList;
use Src\Task\Domain\Entities\TaskEntity;

class TaskMapper
{
    /**
     * @param Collection<int,Task> $collection
     */
    public static function collectionToList(Collection $collection): TaskEntityList
    {
        $list = new TaskEntityList();

        foreach ($collection as $item) {
            $list->add(
                self::modelToEntity($item)
            );
        }

        return $list;
    }

    public static function modelToEntity(Task $task): TaskEntity
    {
        return new TaskEntity(
            $task->id,
            $task->title,
            $task->description,
            $task->is_done,
            $task->user_id
        );
    }
}
