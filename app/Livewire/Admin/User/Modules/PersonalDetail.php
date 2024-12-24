<?php

namespace App\Livewire\Admin\User\Modules;

use App\Helpers\BaseHelper;
use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    public string $createdAt;

    public string $email;

    public string $verified;

    public function mount(): void
    {
        $this->email = $this->user->email;
        $this->createdAt = BaseHelper::dateFormat($this->user->created_at);
        $this->verified = $this->user->email_verified_at != null ? BaseHelper::dateFormat($this->user->email_verified_at) : __('Unverified Account');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-detail');
    }
}
