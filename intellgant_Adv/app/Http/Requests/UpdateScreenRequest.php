<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScreenRequest extends FormRequest
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
            'user_id' => ['required', 'integer','exists:users,id'],
            'description' => ['required', 'min:3|max:1000'],
            'code' => ['nullable', 'integer', 'unique:screens,code,'.$this->screen->id],
            'status' => ['required','boolean'],
        ];
    }
}
