<?php

namespace App\Livewire\User\Home;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomePage extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.home.home-page');
    }
}
