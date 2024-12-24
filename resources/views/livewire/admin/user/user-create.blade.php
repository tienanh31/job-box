<div>
    <x-form wire:submit.prevent="saveUser">
        <div class="row">
            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Email')"
                    class="form-control"
                    type="email"
                    id="email"
                    name="email"
                    model="email"
                    placeholder="{{ __('Enter email') }}"
                    rows="7"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Password')"
                    class="form-control"
                    type="password"
                    id="password"
                    name="password"
                    model="password"
                    placeholder="{{ __('Enter password') }}"
                    rows="7"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Password Confirmation')"
                    class="form-control"
                    type="password"
                    id="passwordConfirmation"
                    name="passwordConfirmation"
                    model="passwordConfirmation"
                    placeholder="{{ __('Enter password confirmation') }}"
                    rows="7"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Create New') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
