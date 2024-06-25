@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'cursor-pointer lock w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-300 focus:border-[--custom-rose] focus:ring-[--custom-rose] rounded-md shadow-sm
file:bg-gray-50 file:border-0
file:me-4
file:py-3 file:px-4
dark:file:bg-neutral-700 dark:file:text-neutral-400']) !!} />
