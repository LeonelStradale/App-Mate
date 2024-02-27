<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    use HasFactory;

    protected $table = 'metrics';

    protected $fillable = [
        'room_temperature',
        'liquid_temperature',
        'measurement_time',
    ];
}
