<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'school',
        'majors',
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
