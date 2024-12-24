<div>
    <x-form wire:submit.prevent="savePrivacyPolicy">
        <div class="col-lg-12">
            <x-admin.editor
                :label="__('Privacy Policy')"
                class="form-control"
                type="text"
                id="privacyPolicy"
                name="privacyPolicy"
                model="privacyPolicy"
                rows="7"
                placeholder="{{ __('Enter privacy policy') }}"
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
