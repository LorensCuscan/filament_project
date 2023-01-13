<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_id',
        'date_from',
        'date_to',
        'guest_id',
        'hotel_id',
        'room_id',
    ];

    public function period_id(){
        return $this->hasMany(Hotel::class);
        return $this->hasMany(Room::class);
        return $this->hasMany(Guest::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
