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
                        'order'    =>   'required|integer'
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
            'question.required' => '必須填寫問題',
            'question.min'      => '問題長度必須大於3字元',
            'answer.required'   => '必須填寫回答',
            'answer.min'        => '回答長度必須大於3字元',
            'order.required'    => '必須填寫排序數字',
            'order.integer'     => '排序格式有誤，請重試',
            'ids.required'      => '必須選擇刪除的資料',
            'ids.array'         => '刪除數據有誤，請重試',
            'ids.*.integer'     => '刪除數據有誤，請重試'
        ];
    }
}
