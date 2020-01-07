<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'between:1.00,1000.00'],
            'allowed_ads' => ['required', 'integer'],
            'duration' => ['required', 'integer'],
            'description' => ['required', 'min:3|max:1000'],
            'allow_statistics' => ['required', 'boolean'],
            'models' => ['required'],
        ];
    }
}
