<?php

namespace App\Helpers;

class MonthHelper
{
    public static function getMonths(): array
    {
        return [
            1 => trans('Jan'),
            2 => trans('Feb'),
            3 => trans('Mar'),
            4 => trans('Apr'),
            5 => trans('May'),
            6 => trans('Jun'),
            7 => trans('Jul'),
            8 => trans('Aug'),
            9 => trans('Sep'),
            10 => trans('Oct'),
            11 => trans('Nov'),
            12 => trans('Dec'),
        ];
    }
}
