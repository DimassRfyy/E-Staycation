<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'icon',
        'country_id',
        'slug',
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }
}
