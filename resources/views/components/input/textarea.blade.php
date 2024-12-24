@props([
    'label' => null,
    'type' => 'text',
    'class' => null,
    'placeholder' => null,
    'model' => null,
    'name' => null,
    'id' => null,
    'value' => null,
    ])

<div>
    @if($label) <label for="{{ $id }}" class="form-label">{{ $label }}</label> @endif
    <textarea
        @if($type) type="{{ $type }}" @endif
    @if($class) class="{{ $class }} @error($model) is-invalid @enderror" @endif
        @if($id) id="{{ $id }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($model) wire:model="{{ $model }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($name) name="{{ $name }}" @endif
        {{ $attributes }}
    >

    {{ $slot }}
    </textarea>

    @error($model)
    <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
