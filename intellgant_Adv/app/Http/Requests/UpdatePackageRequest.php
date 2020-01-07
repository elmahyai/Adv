<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'between:1.00,1000.00'],
            'allowed_ads' => ['nullable', 'integer'],
            'duration' => ['nullable', 'integer'],
            'description' => ['nullable', 'min:3|max:1000'],
            'allow_statistics' => ['nullable', 'boolean'],
            'models' => ['required'],
        ];
    }
}
