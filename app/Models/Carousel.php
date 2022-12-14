<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'curator_id',
        'title',
        'note',
        'image',
        'status',
    ];

    public function curator()
    {
        return $this->belongsTo('App\Models\User', 'curator_id');
    }
}
