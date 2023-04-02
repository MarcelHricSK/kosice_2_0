<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'poi_id',
        'name',
        'description',
        'datetime',
    ];
}
