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
}
