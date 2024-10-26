<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelPhoto extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'photo',
        'hotel_id',
    ];
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
