<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'icon',
        'slug',
    ];

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }

    public function cities(): HasMany {
        return $this->hasMany(City::class);
    }
}
