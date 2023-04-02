<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POI extends Model
{
    protected $table = 'pois';

    protected $fillable = [
        'name',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'poi_id');
    }
}
