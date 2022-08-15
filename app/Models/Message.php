<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'curator_id',
        'name',
        'email',
        'subject',
        'message',
        'remarks',
        'curator_reply',
    ];
}
