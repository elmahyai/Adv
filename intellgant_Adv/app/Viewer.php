<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    protected $fillable = ['screen_id', 'number_of_people', 'smiling_percentage', 'time_in_front_of_camera', 'advertisement_id', 'watcher'];

    protected $table = 'viewers';

    /* relation */

    public function advertisement()
    {
        return $this->belongsTo('App\Advertisement','advertisement_id');
    }

    public function screen()
    {
        return $this->belongsTo('App\Screen','screen_id');
    }

    public function classes()
    {
        return $this->belongsToMany('App\ModelClass','viewer_Model_classes', 'viewer_id','model_class_id');
    }
}
