<?php

namespace App\Livewire\Admin\User\Modules;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class JobCompany extends Component
{
    public mixed $userId;

    public function render(): View
    {
        $jobStatusCounts = DB::table('jobs')
            ->join('applications', 'jobs.id', '=', 'applications.job_id')
            ->where('jobs.company_id', $this->userId)
            ->whereIn('applications.status', ['accepted', 'rejected'])
            ->select('applications.status', DB::raw('count(*) as count'))
            ->groupBy('applications.status')
            ->get()
            ->keyBy('status')
            ->map
            ->count;

        return view('livewire.admin.user.modules.job-company', [
            'acceptedJob' => $jobStatusCounts->get('accepted'),
            'rejectedJob' => $jobStatusCounts->get('rejected'),
        ]);
    }
}
