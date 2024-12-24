<div>
    <x-form wire:submit.prevent="saveProject">
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
                    :label="__('Customer')"
                    class="form-control"
                    type="text"
                    id="customer"
                    name="customer"
                    model="customer"
                    placeholder="{{ __('Enter customer name') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Number Of Members')"
                    class="form-control"
                    type="number"
                    id="numberOfMembers"
                    name="numberOfMembers"
                    model="numberOfMembers"
                    placeholder="{{ __('Enter quantity') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Position')"
                    class="form-control"
                    type="text"
                    id="position"
                    name="position"
                    model="position"
                    placeholder="{{ __('Enter position') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input
                    :label="__('Technology')"
                    class="form-control"
                    type="text"
                    id="technology"
                    name="technology"
                    model="technology"
                    placeholder="{{ __('Enter technology') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-6">
                <p class="font-weight-bold">{{ __('Time') }} <span class="text-danger">*</span></p>
                <x-admin.input.checkbox
                    name="toggle"
                    id="toggle-project"
                    model="toggle"
                    value="true"
                >{{ __('I am working here') }}</x-admin.input.checkbox>
            </div>

            <div class="col-lg-6"></div>

            <div class="col-lg-6">
                <x-admin.datepicker
                    :label="__('Start At')"
                    name="startAt"
                    model="startAt"
                    id="startAt"
                ></x-admin.datepicker>
            </div>

            @if(! $toggle)
                <div class="col-lg-6">
                    <x-admin.datepicker
                        :label="__('End At')"
                        name="endAt"
                        model="endAt"
                        id="endAt"
                        :require="false"
                    ></x-admin.datepicker>
                </div>
            @endif

            <div class="col-lg-12">
                <x-admin.input.textarea
                    :label="__('Description')"
                    class="form-control"
                    type="text"
                    id="description"
                    name="description"
                    model="description"
                    placeholder="{{ __('Enter description') }}"
                    rows="7"
                ></x-admin.input.textarea>
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
