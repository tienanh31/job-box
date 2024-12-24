<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'customer',
        'number_of_members',
        'position',
        'technology',
        'start_at',
        'end_at',
        'description',
        'student_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
