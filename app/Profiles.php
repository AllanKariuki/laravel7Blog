<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = [
        'description',
        'profile_image'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'user_id', 'id');
    }
    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
