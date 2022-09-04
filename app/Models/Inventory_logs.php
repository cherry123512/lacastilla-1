<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory_logs extends Model
{
    use HasFactory;

    protected $fillable = [
        'curator_id',
        'logs',
        'inventory_id',
    ];
}
