<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSearchData extends Model
{
    protected $table = 'user_search_data';

    protected $fillable = [
        'name',
        'city',
        'email'
    ];
}
