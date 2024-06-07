<?php

namespace Src\Task\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Task\Application\DTO\UpdateTaskDTO;

class UpdateTaskRequest extends FormRequest
{
    protected $errorBag = 'updateTask';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'task_title'       => 'required|string|max:50',
            'task_description' => 'required|string',
        ];
    }

    public function dto(int $taskId): UpdateTaskDTO
    {
        return new UpdateTaskDTO(
            $taskId,
            $this->input('task_title'),
            $this->input('task_description'),
            (bool) $this->input('is_done')
        );
    }
}
