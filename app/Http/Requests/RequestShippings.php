<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestShippings extends FormRequest
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
            'shipping_email'=>'required|email',
            'shipping_name'=>'required',
            'shipping_address'=>'required',
            'shipping_phone'=>'required',
            'shipping_notes'=>'required'
        ];
    }
}
