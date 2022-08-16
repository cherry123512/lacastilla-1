<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'date',
        'time_from',
        'time_to',
        'remarks',
    ];
}
