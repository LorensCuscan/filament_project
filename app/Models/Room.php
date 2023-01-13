<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'service',
        'guests',
        'class',
        'floor',
        'price',
        'hotel_id'
    ];

    public function room_id(){
        return $this->hasMany(Guest::class);
        return $this->hasMany(Payment::class);
        return $this->hasMany(Period::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
