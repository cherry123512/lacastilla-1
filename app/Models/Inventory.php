<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'curator_id',
        'type_of_object',
        'location_of_object',
        'description_title',
        'number_of_pieces',
        'length',
        'width',
        'weight',
        'height',
        'diameter',
        'reference_number',
        'medium_and_material',
        'maker_artist',
        'location_of_signation',
        'date_of_birth',
        'location_of_date_on_object',
        'writing_other_than_signature',
        'place_of_origin',
        'place_collected',
        'date_received',
        'original_as_shown',
        'object_original_used',
        'receipt',
        'item_description',
        'condition_of_object',
        'history',
        'purchase_or_received',
        'personal_story_of_this_object',
        'inventory_image',
        'adapted_to_another_used',

    ];

    public function curator()
    {
        return $this->belongsTo('App\Models\User', 'curator_id');
    }

    public function log()
    {
        return $this->hasMany('App\Models\Inventory_logs', 'inventory_id')->orderBy('id','desc');
    }
}
