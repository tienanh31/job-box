<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name',
        'description',
    ];

    public function skillable(): MorphTo
    {
        return $this->morphTo();
    }
}
