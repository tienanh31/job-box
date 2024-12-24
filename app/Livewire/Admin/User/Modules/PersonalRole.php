<?php

namespace App\Livewire\Admin\User\Modules;

use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class PersonalRole extends Component
{
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public mixed $user;

    #[Validate('nullable')]
    public mixed $userHasRoles = [];

    public function mount(): void
    {
        $roles = $this->user->getRoleNames();

        foreach ($roles as $role) {
            $this->userHasRoles[] = $role;
        }
    }

    public function saveRole(): void
    {
        $this->authorizeRoleOrPermission('role-user-edit');
        $validatedData = $this->validate();

        if ($this->user->is_root === 1) {
            $this->alert('warning', trans('You can not update this account'));
            return;
        }

        $this->user->syncRoles($validatedData);
        $this->dispatch('refresh');
        $this->alert('success', trans('Update success!'));
    }

    public function render(): View
    {
        $roles = Role::all()->pluck('name');

        return view('livewire.admin.user.modules.personal-role', [
            'roles' => $roles,
        ]);
    }
}
