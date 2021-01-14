<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['food_id', 'venue_id', 'amount'];
    protected $dates = ['created_at', 'updated_at'];
}
