<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    protected $fillable = ['user_id', 'package_id', 'used_ads', 'subscription_date'];
    protected $table = 'consumptions';

    /* Relations */

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Package', 'package_id');
    }
}
