<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'name',
        'payload',
    ];

    public static function getSettingByName(string $name)
    {
        return self::where('name', $name)
            ->pluck('payload')
            ->firstOrFail();
    }
}
