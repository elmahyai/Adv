<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $fillable = ['name', 'description', 'user_id', 'default_url', 'waiting_url', 'code', 'status'];

    /* Relations */

    public function advertisements()
    {
        return $this->belongsToMany('App\Advertisement', 'screen_advertisement','screen_id','advertisement_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
