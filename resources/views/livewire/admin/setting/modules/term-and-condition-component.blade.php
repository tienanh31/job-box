<div>
    <x-form wire:submit.prevent=saveTermAndCondition>
        <div class="col-lg-12">
            <x-admin.editor
                :label="__('Term And Conditions')"
                class="form-control"
                type="text"
                id="termAndCondition"
                name="termAndCondition"
                model="termAndCondition"
                rows="7"
                placeholder="{{ __('Enter term and conditions') }}"
            >
            </x-admin.editor>

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Save Data') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
