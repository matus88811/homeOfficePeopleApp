<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $dates = [
        'birthday'
    ];

    protected $guarded = [];
}
