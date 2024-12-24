@props([
    'label' => null,
    'model' => null,
    'name' => null,
    'id' => null,
    'require' => true,
    ])

<div class="mb-3">
    @if($label) <label for="{{ $id }}" class="form-label">{{ $label }} @if($require === true) <span class="text-danger">*</span> @endif</label> @endif
    <input
        class="form-control datepicker"
        @if($id) id="{{ $id }}" @endif
        @if($model) wire:model="{{ $model }}" @endif
        @if($name) name="{{ $name }}" @endif
        placeholder="YYYY-MM-dd"
        {{ $attributes }}
    >

    {{ $slot }}

    @error($model)
    <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

@pushonce('scripts')
    <script type="text/javascript">
        flatpickr(".datepicker");
        document.addEventListener('livewire:initialized', () => {
            @this.on('refresh', (event) => {
                flatpickr(document.querySelector('.datepicker')).clear();
                flatpickr(".datepicker", {
                    dateFormat: "Y-m-d",
                });
            });
        });
    </script>
@endpushonce
