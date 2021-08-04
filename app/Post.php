<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $table= 'posts';
    public $primary_key ='id';
    public $timestamps = true;
    // public $fillable=[
    //     'title',
    //     'body',
    //     'user_id'
    // ];

    public function user()
    {
            return $this->belongsTo('App\User', 'user_id', 'id');

    }
    public function profile()
    {
        return $this->belongsTo('App\Profiles', 'user_id', 'user_id');
    }
}
