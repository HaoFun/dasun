<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'config_name'    => 'required|min:3',
            'config_phone'   => 'required',
            'config_address' => 'required',
            'config_email'   => 'required|email',
            'config_fax'     => 'required',
            'config_house'   => 'required',
            'description'    => 'required|min:3',
            'keywords'       => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
