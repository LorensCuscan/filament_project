<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodsRequest extends Model
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
}
