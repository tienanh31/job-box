<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialActivity extends Model
{
    protected $table = 'social_activities';

    protected $fillable = [
        'organization',
        'position',
        'start_at',
        'end_at',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
