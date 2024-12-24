<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PersonalPermission extends Component
{
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public User $user;

    #[Validate('nullable')]
    public mixed $userHasPermissions = [];

    #[On('refresh')]
    public function mount(): void
    {
        $permissions = $this->user->getAllPermissions();

        foreach ($permissions as $permission) {
            $this->userHasPermissions[] = $permission->id;
        }
    }

    public function savePermission(): void
    {
        $this->authorizeRoleOrPermission('permission-user-edit');
        $validatedData = $this->validate();

        if ($this->user->is_root === 1) {
            $this->alert('warning', trans('You can not update this account'));
            return;
        }

        $this->user->syncPermissions($validatedData['userHasPermissions']);
        $this->alert('success', trans('Update success!'));
        $this->dispatch('refresh');
    }

    public function render(): View
    {

        $permissions = Permission::all();

        return view('livewire.admin.user.modules.personal-permission', [
            'permissions' => $permissions,
        ]);
    }
}
