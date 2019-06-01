<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityData extends Model
{
    protected $table = 'city_data';

    protected $fillable = [
        'city',
        'country',
        'latitude',
        'longtitude'
    ];
}
