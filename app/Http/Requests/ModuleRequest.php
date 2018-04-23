<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
                        'name'      =>   'required',
                        'url'       =>   'required',
                        'order'     =>   'required|integer'
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
            'name.required'    =>  '必須填寫模板名稱',
            'url.required'     =>  '必須填寫URL地址',
            'order.required'   =>  '必須填寫排序數字',
            'order.integer'    =>  '排序格式錯誤，請填寫數字',
            'ids.required'      => '必須選擇刪除的資料',
            'ids.array'         => '刪除數據有誤，請重試',
            'ids.*.integer'     => '刪除數據有誤，請重試'
        ];
    }
}
