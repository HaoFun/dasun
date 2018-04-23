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
                    'title'       =>   'required',
                    'content'     =>   'required',
                    'publish_at'  =>   'required|date'
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
            'title.required'   =>  '必須填寫最新消息標題',
            'content.required' =>  '必須填寫最新消息內容',
            'publish_at.required' => '必須填寫發佈日期',
            'publish_at.date'     => '發佈日期格式錯誤',
            'ids.required'      => '必須選擇刪除的資料',
            'ids.array'         => '刪除數據有誤，請重試',
            'ids.*.integer'     => '刪除數據有誤，請重試'
        ];
    }
}
