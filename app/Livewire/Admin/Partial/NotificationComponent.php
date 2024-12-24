<?php

namespace App\Livewire\Admin\Partial;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationComponent extends Component
{
    public mixed $notifications;

    public int $unread = 0;

    #[On('refresh')]
    public function mount(): void
    {
        $this->notifications = DatabaseNotification::orderByDesc('created_at')
            ->limit(7)
            ->get();
        $this->unread = DatabaseNotification::whereNull('read_at')
            ->count();
    }

    public function render(): View
    {
        return view('livewire.admin.partial.notification-component');
    }
}
