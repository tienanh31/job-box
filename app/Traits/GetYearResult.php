<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait GetYearResult
{
    private function getYearResults(Builder $query, int $year): Collection
    {
        return $query->getModel()
            ->newQuery()
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->whereYear('created_at', $year)
            ->get();
    }
}
