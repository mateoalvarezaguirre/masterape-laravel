@props(['taskId', 'show' => false])

<x-modal name="confirm-task-deletion-{{ $taskId }}"
         :show="$show"
         focusable>
    <form method="post" action="{{ route('tasks.destroy', $taskId) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to delete the task?') }}
        </h2>
        <div class="mt-6 flex justify-center">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete task') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
