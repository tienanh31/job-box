<?php

namespace App\Livewire\User\Job\Detail;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Component;

class JobCompany extends Component
{
    public string|int $jobId;

    public mixed $companyProfile;

    public function mount(): void
    {
        $this->companyProfile = Job::findOrFail($this->jobId)->company->companyProfile;
    }

    public function render(): View
    {
        return view('livewire.user.job.detail.job-company');
    }
}
