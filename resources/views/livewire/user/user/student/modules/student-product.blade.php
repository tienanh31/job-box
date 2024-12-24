<div>
    <x-form wire:submit.prevent="saveProduct">
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
                    :label="__('Type')"
                    class="form-control"
                    type="text"
                    id="type"
                    name="type"
                    model="type"
                    placeholder="{{ __('Enter type') }}"
                ></x-admin.input>
            </div>

            <div class="col-lg-6">
                <x-admin.datepicker
                    :label="__('Completion time')"
                    name="completionTime"
                    model="completionTime"
                    id="completionTime"
                ></x-admin.datepicker>
            </div>

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
