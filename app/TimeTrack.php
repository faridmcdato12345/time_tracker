<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTrack extends Model
{
    protected $fillable = [
        'user_id','client_id','time_consume',
    ];

    public function client(){
        return $this->belongsTo('App\Client','client_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
