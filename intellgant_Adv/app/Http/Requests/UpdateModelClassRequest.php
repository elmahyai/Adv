<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModelClassRequest extends FormRequest
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
            'class_name' => ['required', 'string', 'max:100'],
            'model_id' => ['required', 'integer','exists:models,id'],
        ];
    }
}
