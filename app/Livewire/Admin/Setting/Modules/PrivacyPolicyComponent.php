<?php

namespace App\Livewire\Admin\Setting\Modules;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    use LivewireAlert;

    #[Validate('required|string')]
    public string $privacyPolicy;

    public function mount(): void
    {
        $repositories = new SettingRepository();
        $settings = $repositories->getAllSettings();

        $this->privacyPolicy = $settings['privacyPolicy'];
    }

    public function savePrivacyPolicy(): void
    {
        $validatedData = $this->validate();

        Setting::updateOrCreate([
            'name' => 'privacyPolicy'
        ], [
            'payload' => $validatedData['privacyPolicy']
        ]);

        Artisan::call('cache:clear');
        $this->alert('success', trans('Update success'));
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.privacy-policy-component');
    }
}
