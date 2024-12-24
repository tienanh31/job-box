<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrendingWord extends Model
{
    protected $table = 'trending_words';

    protected $fillable = [
        'name',
        'count',
    ];
}
