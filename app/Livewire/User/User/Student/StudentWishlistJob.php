<?php

namespace App\Livewire\User\User\Student;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class StudentWishlistJob extends Component
{
    use WithPagination;

    public int $itemPerPage = 10;

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        $user = User::with('wishlists')
            ->find(Auth::id());

        $jobs = $user->wishlists()
            ->with('company')
            ->paginate($this->itemPerPage);

        return view('livewire.user.user.student.student-wishlist-job', [
            'jobs' => $jobs
        ]);
    }
}
