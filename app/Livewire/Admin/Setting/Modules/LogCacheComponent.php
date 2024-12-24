<?php

namespace App\Livewire\Admin\Setting\Modules;

use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LogCacheComponent extends Component
{
    use LivewireAlert;

    public function clearCache(): void
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('config:clear');
        $this->alert('success', trans('Delete success'));
    }

    public function clearAuthenticateLogs(): void
    {
        Artisan::call('authentication-log:purge');
        $this->alert('success', trans('Delete success'));
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.log-cache-component');
    }
}
