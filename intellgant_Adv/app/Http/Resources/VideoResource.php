<?php

namespace App\Http\Resources;

use App\ModelClass;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    //glasses,noglasses, male, female, age age_min, age_max, video_url, viedio_id
    public function toArray($request)
    {
        if($this) {
            $alreadyclass = [];
            foreach ($this->modelClasses as $class) {
                $alreadyclass[$class->class_name] = 1;
            }
            $allclasses = [];
            foreach (ModelClass::all() as  $modelClass)
            {
                $allclasses[$modelClass->class_name] = 0;
            }
            array_merge($alreadyclass, $allclasses);
            foreach ($alreadyclass as $key => $value) {
                $allclasses[$key] = $value;
            }
            $allclasses['video_url'] = $this->url;
            $allclasses['video_id'] = $this->id;
            return $allclasses;
        }
        return null;
    }
}
