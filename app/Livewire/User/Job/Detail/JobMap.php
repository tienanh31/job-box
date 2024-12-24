<?php

namespace App\Livewire\User\Job\Detail;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Component;

class JobMap extends Component
{
    public mixed $jobId;

    public mixed $job;

    public mixed $locations;

    public function mount(): void
    {
        $this->job = Job::findOrFail($this->jobId);
    }

    public function getLocations(): mixed
    {
        $locations = $this->job->addresses;

        return $locations->map(function ($location) {
            return [
                'name' => $location->ward->name . ', ' . $location->district->name . ', ' . $location->province->name,
                'longitude' => (float) $location->longitude,
                'latitude' => (float) $location->latitude,
            ];
        });
    }

    public function render(): View
    {
        return view('livewire.user.job.detail.job-map');
    }
}
