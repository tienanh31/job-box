<?php

namespace App\Livewire\User\TermAndCondition;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Điều khoản & Điều kiện')]
class TermAndConditionComponent extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.term-and-condition.term-and-condition-component');
    }
}
