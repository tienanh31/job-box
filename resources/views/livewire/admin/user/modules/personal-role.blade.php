<div>
    <div class="mb-2">
        <span><strong>{{ __('Roles') }}</strong></span>
    </div>
    <x-form wire:submit.prevent="saveRole">
        <div class="row">
            @foreach($roles as $key => $role)
                <div class="col-lg-4">
                    <div class="form-check">
                        <input class="form-check-input"
                               name="userHasRoles"
                               wire:model="userHasRoles"
                               type="checkbox"
                               value="{{ $role }}"
                               id="{{ $role }}"
                               checked
                        >
                        <label class="form-check-label" for="{{ $role }}">
                            {{ $role }}
                        </label>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Update') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
