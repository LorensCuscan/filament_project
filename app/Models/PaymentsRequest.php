<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'desc',
        'guest_id',
        'hotel_id',
        'room_id'
    ];
}
