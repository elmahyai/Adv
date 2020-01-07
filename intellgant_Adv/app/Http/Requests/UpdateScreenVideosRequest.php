<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScreenVideosRequest extends FormRequest
{
    /**
     * Determine if the usersTableSeeder is authorized to make this request.
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
            'default_url' => ['nullable', 'file', 'mimes:mp4,mov,ogg,webm | max:640000'],
            'waiting_url' => ['nullable', 'file', 'mimes:mp4,mov,ogg,webm | max:640000'],
        ];
    }
}
