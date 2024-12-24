<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'name',
        'addressable_type',
        'addressable_id',
        'ward_id',
        'district_id',
        'province_id',
        'longitude',
        'latitude',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
