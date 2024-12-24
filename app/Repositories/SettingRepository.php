<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function getAllSettings()
    {
        return Setting::pluck('payload', 'name')->toArray();
    }
}
