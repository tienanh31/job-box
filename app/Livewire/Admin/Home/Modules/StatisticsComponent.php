<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class StatisticsComponent extends Component
{
    public function render(): View
    {
        $userCounts = User::count();
        $jobCounts = Job::count();
        $applicationCounts = DB::table('applications')
            ->whereIn('status', ['accepted', 'rejected'])
            ->groupBy('status')
            ->pluck(DB::raw('count(*)'), 'status');

        $acceptedJobCounts = $applicationCounts['accepted'] ?? 0;
        $rejectedJobCounts = $applicationCounts['rejected'] ?? 0;

        return view('livewire.admin.home.modules.statistics-component', [
            'userCounts' => $userCounts,
            'jobCounts' => $jobCounts,
            'acceptedJobCounts' => $acceptedJobCounts,
            'rejectedJobCounts' => $rejectedJobCounts,
        ]);
    }
}
