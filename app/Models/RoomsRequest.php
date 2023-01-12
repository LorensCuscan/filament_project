<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsRequest extends Model
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
}
