<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    protected $fillable = [
        'room_type',
        'price',
        'capacity',
        'description',
        ];

    public function Booking()
    {
        return $this->hasMany(Room::class, 'room_id');
    }
}
