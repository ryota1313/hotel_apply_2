<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'plan_id',
        'room_id',
        'check_in',
        'check_out',
        'total_price',
        'people',
        'status',
        ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

}
