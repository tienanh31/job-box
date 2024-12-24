<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class UserChart extends Component
{
    public function render(): View
    {
        $users = User::groupByMonth();

        return view('livewire.admin.home.modules.user-chart', [
            'currentYearUsers' => $users['currentYearUsers'],
            'previousYearUsers' => $users['previousYearUsers'],
            'labels' => $users['labels'],
        ]);
    }
}
