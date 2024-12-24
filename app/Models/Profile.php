<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'payload',
        'profileable_id',
        'profileable_type',
        'type',
    ];

    protected $casts = [
        'payload' => 'json',
    ];

    public function profileable(): MorphTo
    {
        return $this->morphTo();
    }
}
