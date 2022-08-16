<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'curator_id',
        'status',
    ];

    public function curator()
    {
        return $this->belongsTo('App\Models\User', 'curator_id');
    }

    public function schedule_details()
    {
        return $this->hasMany('App\Models\Schedule_details', 'schedule_id');
    }
}
