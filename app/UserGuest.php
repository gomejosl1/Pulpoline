<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGuest extends Model
{


        protected $table = 'user_guest';

        protected $fillable = [
        'emailGuest',     
        'attemps',
        'date_guest',
    ];


}
