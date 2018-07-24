<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTrack extends Model
{
    protected $fillable = [
        'user_id','client_id','time_consume',
    ];
}
