<?php

namespace App\Models;

use App\Enums\ImageType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type',
        'type',
        'title',
        'description',
    ];

    protected $casts = [
        'type' => ImageType::class,
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
