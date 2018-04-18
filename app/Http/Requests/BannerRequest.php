<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        //upload file size max : 10mb
        return [
            'module_id' => 'required|integer',
            'image'     => 'required|image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:min_width=200,min_height=200'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
