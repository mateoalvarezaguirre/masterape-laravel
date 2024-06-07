<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'task-created')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{__('Task created successfully!')}}
                </div>
            @endif
            @if (session('status') === 'task-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{__('Task updated successfully!')}}
                </div>
            @endif
                @if (session('status') === 'task-deleted')
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 5000)"
                        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        {{__('Task deleted successfully!')}}
                    </div>
                @endif
            <div class="py-6 flex justify-end items-center gap-4">
                <x-primary-button
                    x-on:click.prevent="$dispatch('open-modal', 'create-task-modal')"
                >{{ __('Create new task') }}
                </x-primary-button>
                <x-create-task-modal />
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(empty($tasks))
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Ups! We didn't find any task, create a new one here!") }}
                    </div>
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto w-full">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td class="w-1/12 px-4 py-2 text-center">{{ $task->id }}</td>
                                        <td class="w-8/12 px-4 py-2 text-center">{{ $task->title }}</td>
                                        <td class="w-8/12 px-4 py-2 text-center">
                                            <x-status-tag :color="$task->is_done ? 'green' : 'yellow'">
                                                {{ $task->is_done ? 'Done' : 'Pending' }}
                                            </x-status-tag>
                                        </td>
                                        <td class="w-3/12 px-4 py-2 text-center">
                                            <div class="flex gap-6">
                                                <x-secondary-button
                                                    x-on:click.prevent="$dispatch('open-modal', 'update-task-modal-{{ $task->id }}')">
                                                    Edit
                                                </x-secondary-button>
                                                <x-danger-button
                                                    x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-task-deletion-{{$task->id}}')">
                                                    Delete
                                                </x-danger-button>
                                            </div>
                                            <x-confirm-task-deletion-modal :taskId="$task->id"/>
                                            <x-update-task-modal :task="$task" :show="$errors->updateTask->isNotEmpty()" />
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
