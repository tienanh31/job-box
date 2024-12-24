@props([
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => null,
])

<div class="form-check mb-3">
    <input
        class="form-check-input"
        type="checkbox"
        id="{{ $id }}"
        name="{{ $name }}"
        @if($model) wire:model.live="{{ $model }}" @endif
        @if($value) value="{{ $value }}" @endif
    >
    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
