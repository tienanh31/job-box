<?php

namespace App\Livewire\User\Job;

use App\Models\User;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Wishlist extends Component
{
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public mixed $jobId;

    public mixed $wishlist = [];

    public mixed $user;

    #[On('refresh')]
    public function mount(): void
    {
        if (!Auth::user()) {
            $this->wishlist = [];
            return;
        }

        $user = User::where('id', Auth::id())
            ->with('wishlists')
            ->first();
        $this->user = $user;
        $this->wishlist = $user->wishlists->pluck('id')->toArray() ?? [];
    }

    public function addOrRemoveToWishList(): void
    {
        $this->authorizeRoleOrPermission('student-add-job-to-wishlist');
        if (!Auth::user()) {
            $this->redirectRoute('login');
            toast(trans('You must login before save job'), 'warning');
            return;
        }

        $wishlistJobIds = $this->wishlist;

        if (in_array($this->jobId, $wishlistJobIds)) {
            $this->user->wishlists()->detach($this->jobId);
            $this->alert('success', trans('Remove from wishlist success'));
            $this->dispatch('refresh');
            return;
        }

        $this->user->wishlists()->attach($this->jobId);
        $this->alert('success', trans('Save to wishlist success'));
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.job.wishlist');
    }
}
