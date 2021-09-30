<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMission extends FormRequest
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
            'route' => 'required|string|min:3'
        ];
    }

    public function attributes()
   {
     return [
       'name' => 'Tên chức năng',
       'route'  => 'Đường dẫn'
     ];
   }
}
