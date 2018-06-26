<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name','subscription_id',
    ];

    public function subscriptionType(){
        return $this->belongsTo('App\Subscription','subscription_id');
    }
}
