@props([
    'type' => 'submit',
    'class' => null,
    ])

<button
    type="{{ $type }}"
    class="{{ $class }} @if($type == 'submit') btn-load @endif"
    wire:loading.attr="disabled"
    {{ $attributes }}
>
    {{ $slot }}
</button>
