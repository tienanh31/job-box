<?php

namespace App\Livewire\User\Job\Detail;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Chi Tiết Việc Làm')]
class JobDetail extends Component
{
    public mixed $job;

    public function mount(string|int $id): void
    {
        $job = Job::with(['company', 'addresses.district', 'addresses.province'])
            ->where('status', 'show')
            ->findOrFail($id);

        $this->job = $job;
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.job.detail.job-detail');
    }
}
