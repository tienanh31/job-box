@props([
    'name' => null,
    'model' => null,
])

<div>
    <div class="profile-wid-bg profile-setting-img">
        {{ $slot }}
        <div class="overlay-content">
            <div class="text-end p-3">
                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                    <x-admin.input
                        id="profile-foreground-img-file-input"
                        type="file"
                        class="profile-foreground-img-file-input"
                        name="{{ $name }}"
                        model="{{ $model }}"
                        accept="image/*"></x-admin.input>
                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                        <i class="ri-image-edit-line align-bottom me-1"></i> {{ __('Choose Image') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
