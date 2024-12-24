<?php

namespace App\Livewire\Admin\Setting\Modules;

use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class LogoComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public mixed $logoLight = null;

    public mixed $logoDark = null;

    public mixed $setting;

    #[On('refresh')]
    public function mount(): void
    {
        $this->setting = $logoLight = Setting::getSettingByName('logoLight');
        $this->logoLight = $logoLight;
        $this->logoDark = Setting::getSettingByName('logoDark');
    }

    public function updatedLogoLight(): void
    {
        $validatedData = $this->validate([
            'logoLight' => 'nullable|image|max:2048',
        ]);

        if (!$validatedData['logoLight']) {
            return;
        }

        if ($this->setting) {
            File::delete($this->setting);
            $logoUrl = $validatedData['logoLight']->store('upload');
            Setting::updateOrCreate([
                'name' => 'logoLight',
            ], [
                'payload' => $logoUrl,
            ]);

            Artisan::call('cache:clear');
            $this->alert('success', trans('Update success'));
        }

        $this->dispatch('refresh');
    }

    public function updatedLogoDark(): void
    {
        $validatedData = $this->validate([
            'logoDark' => 'nullable|image|max:2048',
        ]);

        if (!$validatedData['logoDark']) {
            return;
        }

        if ($this->setting) {
            File::delete($this->setting);
            $logoUrl = $validatedData['logoDark']->store('upload');
            Setting::updateOrCreate([
                'name' => 'logoDark',
            ], [
                'payload' => $logoUrl,
            ]);

            Artisan::call('cache:clear');
            $this->alert('success', trans('Update success'));
        }

        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.logo-component');
    }
}
