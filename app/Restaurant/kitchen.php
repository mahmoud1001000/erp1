<?php

namespace App\Restaurant;

use Illuminate\Database\Eloquent\Model;

class kitchen extends Model
{
    protected $guarded = ['id'];

    public function location()
    {
        return $this->belongsTo(\App\BusinessLocation::class, 'location_id');
    }

    public function business()
    {
        return $this->belongsTo(\App\Business::class, 'business_id');
    }
}
