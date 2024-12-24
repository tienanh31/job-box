<?php

namespace App\Livewire\User\PrivacyPolicy;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Chính sách bảo mật')]
class PrivacyPolicyComponent extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.privacy-policy.privacy-policy-component');
    }
}
