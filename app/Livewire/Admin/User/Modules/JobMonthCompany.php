<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class JobMonthCompany extends Component
{
    public mixed $userId;

    public function render(): View
    {
        $user = User::where('id', $this->userId)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'company');
        })->first();

        $jobs = $user->jobs()
            ->whereYear('created_at', Carbon::now()->year)
            ->get()
            ->groupBy(function ($job) {
                return $job->created_at->format('Y-m');
            })
            ->map(function ($group) {
                return $group->count();
            });

        $labels = [];
        $data = [];

        foreach ($jobs as $month => $count) {
            $labels[] = Carbon::parse($month)->format('F');
            $data[] = $count;
        }

        return view('livewire.admin.user.modules.job-month-company', [
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
