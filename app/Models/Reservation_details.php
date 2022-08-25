<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'service_id',
        'amount',
    ];

    public function services()
    {
        return $this->belongsTo('App\Models\Services', 'service_id');
    }
}
