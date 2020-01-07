<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Package extends Model
{
    protected $fillable = ['name', 'price', 'allowed_ads', 'duration', 'description', 'allow_statistics'];

    /* Relations */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function models()
    {
        return $this->belongsToMany('App\AdvModel', 'package_models','package_id', 'model_id');
    }

    public function consumptions()
    {
        return $this->hasMany('App\Consumption', 'package_id');
    }
}
