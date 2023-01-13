<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'name',
        'tel',
        'email',
        'hotel_id',
        'room_id'
    ];

    public function guest_id(){
        return $this->hasMany(Payment::class);
        return $this->hasMany(Period::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
