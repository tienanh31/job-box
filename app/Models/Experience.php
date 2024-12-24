<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'company_name',
        'position',
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
