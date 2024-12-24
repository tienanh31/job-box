<?php

namespace App\Livewire\Admin\Home\Modules;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class ApplicationChart extends Component
{
    protected function getApplicationData(string $status): array
    {
        $query = DB::table('applications')
            ->select(DB::raw('YEAR(created_at) AS year'), DB::raw('COUNT(*) AS total_applications'))
            ->groupBy(DB::raw('YEAR(created_at)'));

        $query->when($status === 'accepted', function ($query) {
            $query->where('status', 'accepted');
        })
            ->when($status === 'rejected', function ($query) {
                $query->where('status', 'rejected');
            });

        $latestApplications = $query->orderBy('year')
            ->limit(10)
            ->get();

        $labels = $latestApplications->pluck('year')
            ->toArray();
        $counts = $latestApplications->pluck('total_applications')
            ->toArray();

        return [
            'labels' => $labels,
            'counts' => $counts,
        ];
    }

    public function render(): View
    {
        $applyJobAcceptedChart = $this->getApplicationData('accepted');
        $applyJobRejectedChart = $this->getApplicationData('rejected');

        return view('livewire.admin.home.modules.application-chart', [
            'acceptedLabels' => $applyJobAcceptedChart['labels'],
            'acceptedData' => $applyJobAcceptedChart['counts'],
            'rejectedLabels' => $applyJobRejectedChart['labels'],
            'rejectedData' => $applyJobRejectedChart['counts'],
        ]);
    }
}
