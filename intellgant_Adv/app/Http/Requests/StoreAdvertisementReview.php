<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertisementReview extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number_of_people' => ['required', 'integer'],
            'age' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'glasses' => ['required', 'string'],
            'smiling_percentage' => ['required', 'integer'],
            'time_in_front_of_camera' => ['required', 'integer'],
            'advertisement_id' => ['required', 'integer'],
            'video_id' => ['required','integer']
        ];
    }
}
