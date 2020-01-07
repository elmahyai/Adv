<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvModel extends Model
{
    protected $fillable = ['name', 'description'];
    protected $table = 'models';

    /* Relations */

    public function packages()
    {
        return $this->belongsToMany('App\Package', 'package_models', 'model_id', 'package_id');
    }

    public function classes()
    {
        return $this->hasMany('App\ModelClass', 'model_id');
    }
}
