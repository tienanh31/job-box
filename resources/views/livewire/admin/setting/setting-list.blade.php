<div>
    @include('admin.partials.page-title')

    <div class="row">
        <div class="col-lg-4">
            <livewire:admin.setting.modules.site-information-component wire:key="siteInformation"></livewire:admin.setting.modules.site-information-component>

            <livewire:admin.setting.modules.notification-component wire:key="notificationComponent"></livewire:admin.setting.modules.notification-component>
        </div>

        <div class="col-lg-8">
            <x-admin.card>
                <livewire:admin.setting.modules.privacy-policy-component wire:key="privacyPolicy"></livewire:admin.setting.modules.privacy-policy-component>

                <livewire:admin.setting.modules.term-and-condition-component wire:key="termAndCondition"></livewire:admin.setting.modules.term-and-condition-component>

                <livewire:admin.setting.modules.log-cache-component wire:key="logCache"></livewire:admin.setting.modules.log-cache-component>
            </x-admin.card>
        </div>
    </div>
</div>
