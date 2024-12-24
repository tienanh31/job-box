<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Helpers\MonthHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class AuthenticationLogChart extends Component
{
    public function render(): View
    {
        $months = MonthHelper::getMonths();

        $statistics = DB::table('authentication_log')
            ->select(DB::raw('YEAR(login_at) AS year, MONTH(login_at) AS month, COUNT(*) AS total'))
            ->whereYear('login_at', Carbon::now()->year)
            ->groupBy('year', 'month')
            ->orderBy('month')
            ->get();

        $labels = $statistics->map(function ($item) use ($months) {
            $month = $item->month;
            return $months[$month];
        })->all();
        $authenticationLogs = $statistics->pluck('total');

        return view('livewire.admin.home.modules.authentication-log-chart', [
            'labels' => $labels,
            'authenticationLogs' => $authenticationLogs,
        ]);
    }
}
