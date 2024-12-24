<div>
    <x-admin.card>
        <livewire:admin.setting.modules.logo-component></livewire:admin.setting.modules.logo-component>

        <x-form wire:submit.prevent="saveSettings">
            <div class="row">
                <div class="col-lg-12">
                    <x-admin.input
                        name="phoneNumber"
                        model="phoneNumber"
                        id="phoneNumber"
                        :label="__('Phone Number')"
                        :placeholder="__('Enter phone number')"
                        class="form-control"></x-admin.input>
                </div>


                <div class="col-lg-12">
                    <x-admin.input
                        name="siteName"
                        model="siteName"
                        id="siteName"
                        :label="__('Site Name')"
                        :placeholder="__('Enter site name')"
                        class="form-control"></x-admin.input>
                </div>

                <div class="col-lg-12">
                    <x-admin.input.textarea
                        name="siteDescription"
                        model="siteDescription"
                        id="siteDescription"
                        :label="__('Site Description')"
                        :placeholder="__('Enter site description')"
                        rows="10"
                        class="form-control"></x-admin.input.textarea>
                </div>

                <div class="col-lg-12">
                    <x-admin.input.textarea
                        name="siteSlogan"
                        model="siteSlogan"
                        id="siteSlogan"
                        :label="__('Site Slogan')"
                        :placeholder="__('Enter site slogan')"
                        rows="10"
                        class="form-control"></x-admin.input.textarea>
                </div>

                <div class="col-lg-12">
                    <x-admin.input
                        name="email"
                        model="email"
                        id="email"
                        :label="__('Email')"
                        :placeholder="__('Enter email')"
                        class="form-control"></x-admin.input>
                </div>

                <div class="col-lg-12">
                    <x-admin.input
                        name="youtube"
                        model="youtube"
                        id="youtube"
                        :label="__('Youtube')"
                        :placeholder="__('Enter link')"
                        :require="false"
                        class="form-control"></x-admin.input>
                </div>

                <div class="col-lg-12">
                    <x-admin.input
                        name="facebook"
                        model="facebook"
                        id="facebook"
                        :label="__('Facebook')"
                        :placeholder="__('Enter link')"
                        :require="false"
                        class="form-control"></x-admin.input>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Save Data') }}</x-button>
                </div>
            </div>
        </x-form>
    </x-admin.card>
</div>
