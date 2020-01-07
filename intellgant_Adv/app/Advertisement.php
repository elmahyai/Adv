<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'url'];

    protected $table = 'advertisements';


    /* Relations */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function advModels()
    {
        return $this->belongsToMany('App\AdvModel','adv_model_advertisement');
    }

    public function screens()
    {
        return $this->belongsToMany('App\Screen', 'screen_advertisement', 'advertisement_id', 'screen_id');
    }

    public function modelClasses()
    {
        return $this->belongsToMany('App\ModelClass', 'advertisement_Model_classes', 'advertisement_id', 'model_class_id');
    }

    public function viewers()
    {
        return $this->hasMany('App\Viewer','advertisement_id');
    }
}
