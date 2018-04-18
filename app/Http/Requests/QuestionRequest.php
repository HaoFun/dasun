<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
                        'question' =>   'required|min:3',
                        'answer'   =>   'required|min:3',
                        'order'    =>   'integer'
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
