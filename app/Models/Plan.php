<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    protected $fillable = [
        'title',
        'body',
        'meal',
        'price',
        'image',
        ];
}
