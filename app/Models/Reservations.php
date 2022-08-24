<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'user_id',
        'reservation_date',
        'reservation_time',
        'number_of_persons',
        'validation_date',
        'curator_id',
        'remarks',
        'status',
    ];

    public function curator()
    {
        return $this->belongsTo('App\Models\User', 'curator_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function sched_details()
    {
        return $this->belongsTo('App\Models\Schedule_details', 'schedule_id');
    }
}
