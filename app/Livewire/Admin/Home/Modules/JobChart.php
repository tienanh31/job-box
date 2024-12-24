<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Component;

class JobChart extends Component
{
    public function render(): View
    {
        $jobs = Job::groupByMonth();

        return view('livewire.admin.home.modules.job-chart', [
            'currentYearJobs' => $jobs['currentYearJobs'],
            'previousYearJobs' => $jobs['previousYearJobs'],
            'labels' => $jobs['labels'],
        ]);
    }
}
