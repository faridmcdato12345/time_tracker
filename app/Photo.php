<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $directory = '/images/';

    protected $fillable = ['path'];

    protected function getPathAttribute($photo){
        return $this->directory . $photo;
    }
}
