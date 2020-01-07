<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'email' => ['nullable','email', 'max:255', 'unique:users,email,' .$this->request->all()['user_id']],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'package' => ['nullable', 'integer','exists:packages'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
