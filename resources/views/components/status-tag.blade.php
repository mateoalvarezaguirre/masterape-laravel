@props(['color'])

<span class="inline-flex items-center bg-{{$color}}-100 text-{{$color}}-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-{{$color}}-900 dark:text-{{$color}}-300">
    <span class="w-2 h-2 me-1 bg-{{$color}}-500 rounded-full"></span>
    {{$slot}}
</span>
