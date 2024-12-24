<div>
    <x-form wire:submit.prevent="saveAward">
        <div class="row">
            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Name')"
                    class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    model="name"
                    placeholder="{{ __('Enter name') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Organization')"
                    class="form-control"
                    type="text"
                    id="organization"
                    name="organization"
                    model="organization"
                    placeholder="{{ __('Enter organization') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.datepicker
                    :label="__('Issued On')"
                    name="issuedOn"
                    model="issuedOn"
                    id="issuedOn"
                ></x-admin.datepicker>
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
