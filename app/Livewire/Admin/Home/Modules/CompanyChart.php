<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class CompanyChart extends Component
{
    public function render(): View
    {
        $companies = User::whereHas('roles', function ($query) {
            $query->where('name', 'Company');
        })
            ->whereHas('companyProfile')
            ->withCount('jobs')
            ->take(10)
            ->get();

        $companyNames = $companies->pluck('companyProfile.payload.name')->toArray();

        $jobCounts = $companies->pluck('jobs_count')->toArray();

        return view('livewire.admin.home.modules.company-chart', [
            'companyNames' => $companyNames,
            'jobCounts' => $jobCounts,
        ]);
    }
}
