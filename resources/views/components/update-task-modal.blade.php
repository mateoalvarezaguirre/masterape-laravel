@props(['task', 'show' => false])

<x-modal name="update-task-modal-{{ $task->id }}"
         :show="$show"
         focusable>
    <form method="post" action="{{ route('tasks.update', $task->id) }}" class="p-6 text-left">
        @csrf
        @method('put')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update task') }}
        </h2>

        <div class="my-3">
            <x-input-label for="task_title" :value="__('Title')" />
            <x-text-input id="task_title" name="task_title" type="text" class="mt-1 block w-full" required
            value="{{old('task_title', $task->title)}}"
            />
            <x-input-error :messages="$errors->updateTask->get('task_title')" class="mt-2" />
        </div>

        <div class="my-3">
            <x-input-label for="task_description" :value="__('Description')" />
            <x-textarea-input id="task_description" name="task_description" type="text" class="mt-1 block w-full" required>
                {{old('task_description', $task->description)}}
            </x-textarea-input>
            <x-input-error :messages="$errors->updateTask->get('task_description')" class="mt-2" />
        </div>

        <div class="my-3">
            <label class="inline-flex items-center cursor-pointer gap-4">
                <span class="text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Is done?')}}</span>
                <input type="checkbox" value="1" name="is_done" class="sr-only peer" @checked($task->is_done)>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
            </label>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close', 'resetForm')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Update') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
