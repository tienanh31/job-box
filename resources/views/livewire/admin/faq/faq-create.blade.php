<div>
    @include('admin.partials.page-title')

    <x-admin.card>
        <x-form wire:submit.prevent="saveFAQ">
            <div class="row">
                <div class="col-lg-6">
                    <label class="form-label">{{ __('Category') }}</label>
                    <select class="form-select" wire:model="categoryName">
                        <option value="">{{ __('Choose An Option') }}</option>
                        <option value="General Questions">{{ __('General Questions') }}</option>
                        <option value="Manage Account">{{ __('Manage Account') }}</option>
                        <option value="Privacy & Security">{{ __('Privacy & Security') }}</option>
                    </select>

                    @error('categoryName')
                    <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <x-admin.input
                        :label="__('Question')"
                        class="form-control"
                        type="text"
                        id="question"
                        name="question"
                        model="question"
                        placeholder="{{ __('Enter question') }}"
                    ></x-admin.input>
                </div>

                <div class="col-lg-12">
                    <x-admin.editor
                        name="answer"
                        model="answer"
                        id="answer"
                        :label="__('Answer')"
                        :placeholder="__('Enter answer')"
                        rows="7"
                        class="form-control"></x-admin.editor>
                </div>

                <div class="col-lg-12">
                    <div class="hstack gap-2 justify-content-end">
                        <x-button
                            type="submit"
                            class="btn btn-primary">{{ __('Save Data') }}</x-button>
                    </div>
                </div>
            </div>
        </x-form>
    </x-admin.card>
</div>
