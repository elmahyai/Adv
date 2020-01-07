<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VideoResource;


class AdvertisementResource extends JsonResource
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
        return [
            "waiting_url" => $this->waiting_url,
            "not_predicted_url" => $this->default_url,
            "videos_list" => VideoResource::collection($this->advertisements)
        ];
    }
}
