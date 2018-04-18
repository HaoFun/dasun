<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'    =>   'required|min:3',
                    'content'  =>   'required|min:3',
                    'publish'  =>   'required|date'
                ];
            }
            case 'DELETE':
            {
                return [
                    'ids'   => 'required|array',
                    'ids.*' => 'integer'
                ];
            }
            case 'GET':
            default:
            {
                return [];
            }
        }
    }

    public function messages()
    {
        return [

        ];
    }
}
