<?php

namespace App\Livewire\User\Job;

use Illuminate\View\View;
use Livewire\Component;

class JobItem extends Component
{
    public mixed $job;

    public function render(): View
    {
        return view('livewire.user.job.job-item');
    }
}
