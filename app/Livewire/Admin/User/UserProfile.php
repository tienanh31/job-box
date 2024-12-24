<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('User Profile')]
class UserProfile extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public mixed $user;

    public function mount(int|string $id): void
    {
        $user = User::findOrFail($id);

        $this->user = $user;
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.user-profile');
    }
}
