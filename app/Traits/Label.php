<?php

namespace App\Traits;

use App\Helpers\MonthHelper;
use Illuminate\Database\Eloquent\Collection;

trait Label
{
    private function getLabels(Collection $currentYearResults, Collection $previousYearResults): array
    {
        $months = MonthHelper::getMonths();
        $labels = [];

        foreach ($currentYearResults as $result) {
            $month = $months[$result->month];
            if (!in_array($month, $labels)) {
                $labels[] = $month;
            }
        }

        foreach ($previousYearResults as $result) {
            $month = $months[$result->month];
            if (!in_array($month, $labels)) {
                $labels[] = $month;
            }
        }

        return $labels;
    }
}
