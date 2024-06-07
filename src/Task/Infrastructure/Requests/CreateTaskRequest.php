<?php

namespace Src\Task\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Src\Task\Application\DTO\CreateTaskDTO;

class CreateTaskRequest extends FormRequest
{
    protected $errorBag = 'createTask';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'task_title'       => 'required|string',
            'task_description' => 'required|string',
        ];
    }

    public function dto(): CreateTaskDTO
    {
        return new CreateTaskDTO(
            (int) Auth::id(),
            $this->input('task_title'),
            $this->input('task_description'),
            (bool) $this->input('is_done')
        );
    }
}
