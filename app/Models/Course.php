<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'name',
        'organization',
        'start_at',
        'end_at',
        'description',
        'student_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
