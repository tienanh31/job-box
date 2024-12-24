@props([
    'label' => null,
    'type' => 'text',
    'class' => null,
    'placeholder' => null,
    'model' => null,
    'name' => null,
    'id' => null,
    'value' => null,
    'require' => true,
    ])

<div class="mb-3">
    @if($label) <label for="{{ $name }}" class="form-label">{{ $label }} @if($require === true) <span class="text-danger">*</span> @endif</label> @endif
    <input
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

    @error($model)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>
