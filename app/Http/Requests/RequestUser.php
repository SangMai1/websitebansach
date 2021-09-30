<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUser extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'gender' => 'required|integer',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|min:11',
            'cmnd' => 'required|string|min:9',
            'address' => 'required|string',
        ];
    }
}
