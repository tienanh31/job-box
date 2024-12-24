<?php

namespace App\Livewire\Admin\Setting\Modules;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TermAndConditionComponent extends Component
{
    use LivewireAlert;

    #[Validate('required|string')]
    public string $termAndCondition;

    public function mount(): void
    {
        $repositories = new SettingRepository();
        $settings = $repositories->getAllSettings();

        $this->termAndCondition = $settings['termAndCondition'];
    }

    public function saveTermAndCondition(): void
    {
        $validatedData = $this->validate();

        Setting::updateOrCreate([
            'name' => 'termAndCondition'
        ], [
            'payload' => $validatedData['termAndCondition']
        ]);

        Artisan::call('cache:clear');
        $this->alert('success', trans('Update success'));
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.term-and-condition-component');
    }
}
