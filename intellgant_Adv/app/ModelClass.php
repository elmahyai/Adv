<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelClass extends Model
{
    protected $fillable = ['class_name', 'model_id'];
    protected $table = 'model_class';

    /* Relations */
    public function model()
    {
        return $this->belongsTo('App\AdvModel', 'model_id');
    }

    public function advertisements()
    {
        return $this->belongsToMany('App\Advertisement', 'advertisement_Model_classes', 'model_class_id', 'advertisement_id');
    }

    public function viewers()
    {
        return $this->belongsToMany('App\Viewer','viewer_Model_classes','model_class_id', 'viewer_id');
    }
}
