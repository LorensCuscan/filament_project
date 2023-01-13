<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'name',
        'cnpj'
    ];

    public function hotel_id(){
        return $this->hasMany(Room::class);
        return $this->hasMany(Guest::class);
        return $this->hasMany(Period::class);
        return $this->hasMany(Payment::class);
    }
}

