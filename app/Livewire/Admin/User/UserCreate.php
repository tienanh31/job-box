<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserCreate extends Component
{
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    #[Validate('required|string|email|unique:users,email')]
    public string $email;

    #[Validate('required|string|min:6|max:32')]
    public string $password;

    #[Validate('required|string|same:password')]
    public string $passwordConfirmation;

    public function saveUser(): void
    {
        $this->authorizeRoleOrPermission('user-create');
        $validatedData = $this->validate();

        User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $this->alert('success', trans('Create success'));
        $this->dispatch('refresh');
        $this->dispatch('hiddenModal');
    }

    public function render(): View
    {
        return view('livewire.admin.user.user-create');
    }
}
