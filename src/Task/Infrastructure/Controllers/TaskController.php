<?php

namespace Src\Task\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Src\Task\Application\DTO\DeleteTaskDTO;
use Src\Task\Application\DTO\GetAllTaskDTO;
use Src\Task\Application\UseCases\CreateTaskUseCase;
use Src\Task\Application\UseCases\DeleteTaskUseCase;
use Src\Task\Application\UseCases\GetAllTaskUseCase;
use Src\Task\Application\UseCases\UpdateTaskUseCase;
use Src\Task\Domain\Repositories\TaskRepository;
use Src\Task\Infrastructure\Requests\CreateTaskRequest;
use Src\Task\Infrastructure\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function __construct(
        private readonly TaskRepository $taskRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = new GetAllTaskUseCase(
            new GetAllTaskDTO((int) Auth::id()),
            $this->taskRepository
        );

        return view('tasks.index', [
            'tasks' => $tasks()->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request): RedirectResponse
    {
        $useCase = new CreateTaskUseCase(
            $request->dto(),
            $this->taskRepository
        );

        $useCase();

        return redirect()->route('tasks.index')->with(
            'status',
            'task-created'
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, int $taskId): RedirectResponse
    {
        $useCase = new UpdateTaskUseCase(
            $request->dto($taskId),
            $this->taskRepository
        );

        $useCase();

        return redirect()->route('tasks.index')->with(
            'status',
            'task-updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $taskId): RedirectResponse
    {
        $useCase = new DeleteTaskUseCase(
            new DeleteTaskDTO($taskId),
            $this->taskRepository
        );

        $useCase();

        return redirect()->route('tasks.index')->with(
            'status',
            'task-deleted'
        );
    }
}
