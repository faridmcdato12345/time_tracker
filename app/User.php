<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use function strtoupper;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\UserType','user_type');
    }

    public function photo(){
        return $this->belongsTo('App\Photo', 'photo_id');
    }

//    public function getNameAttribute($name){
//        return strtoupper($name);
//    }

    public function isAdmin(){
        if($this->role->name == 'administrator' && $this->status == '1'){
            return true;
        }
        return false;
    }
}
