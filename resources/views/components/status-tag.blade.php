@props(['status'])

@if($status === 'success')
    <x-success-badge>{{$slot}}</x-success-badge>
@else
    <x-warning-badge>{{$slot}}</x-warning-badge>
@endif
