<?php

namespace App\Livewire\Admin\Notification;

use App\Helpers\BaseHelper;
use App\Models\Notification;
use App\Traits\AuthorizesRoleOrPermission;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Notifications')]
class NotificationList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public int $itemPerPage = 20;

    public function markAsReadOrUnreadNotification(string|int $id): void
    {
        $notification = Notification::findOrFail($id);

        if ($notification->read_at) {
            $notification->update([
                'read_at' => null,
            ]);

            $this->alert('success', trans('Update success'));
            return;
        }

        $notification->update([
            'read_at' => Carbon::now(),
        ]);

        $this->alert('success', trans('Update success'));
        $this->dispatch('refresh');
    }

    public function deleteNotification(string|int $id): void
    {
        $this->authorizeRoleOrPermission('site-settings');
        $notification = Notification::findOrFail($id);
        $notification->delete();
        $this->alert('success', trans('Delete success'));
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Notifications'));
        $notifications = DatabaseNotification::orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.notification.notification-list', [
            'notifications' => $notifications,
        ]);
    }
}
