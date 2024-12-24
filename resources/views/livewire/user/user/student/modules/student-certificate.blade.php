<div>
    <x-form wire:submit.prevent="saveCertificate">
        <div class="row">
            <div class="col-lg-6">
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

            <div class="col-lg-6">
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

            <div class="col-lg-6">
                <p class="font-weight-bold">{{ __('Time') }} <span class="text-danger">*</span></p>
                <x-admin.input.checkbox
                    name="toggle"
                    id="toggle-certificate"
                    model="toggle"
                >{{ __('Certificates do not have an expiration date') }}</x-admin.input.checkbox>
            </div>

            <div class="col-lg-6"></div>

            <div class="col-lg-6">
                <x-admin.datepicker
                    :label="__('Issued On')"
                    name="issuedOn"
                    model="issuedOn"
                    id="issuedOn"
                ></x-admin.datepicker>
            </div>

            @if(! $toggle)
                <div class="col-lg-6">
                    <x-admin.datepicker
                        :label="__('Expires On')"
                        name="expiresOn"
                        model="expiresOn"
                        id="expiresOn"
                        :require="false"
                    ></x-admin.datepicker>
                </div>
            @endif

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
