<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Models\TrendingWord;
use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class TrendingWordChart extends Component
{
    public function render(): View
    {
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();

        $words = TrendingWord::whereBetween('updated_at', [$weekStart, $weekEnd])
            ->orderByDesc('count')
            ->take(10)
            ->get();

        return view('livewire.admin.home.modules.trending-word-chart', [
            'wordsCount' => $words->pluck('count'),
            'name' => $words->pluck('name'),
        ]);
    }
}
