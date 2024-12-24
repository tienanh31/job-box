<?php

namespace App\Livewire\Admin\Setting\Modules;

use App\Models\Notification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class NotificationComponent extends Component
{
    use LivewireAlert;

    public function clearNotification(): void
    {
        Notification::truncate();
        $this->alert('success', trans('Delete success'));
    }

    public function render(): View
    {
        return view('livewire.admin.setting.modules.notification-component');
    }
}
