@props([
    'class' => null,
    'to' => null,
    'navigate' => true,
    ])

<a
    @if($navigate === true)
        wire:navigate
    @endif
    @if($class) class="{{ $class }}" @endif
    href="{{ $to }}"
    {{ $attributes }}
>
    {{ $slot }}
</a>
