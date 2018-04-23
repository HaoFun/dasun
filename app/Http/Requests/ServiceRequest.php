<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                {
                    return [
                        'title'    => 'required',
                        'content'  => 'required',
                        'image'    => 'required|image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:max_width=1280,max_height=437',
                        'order'    => 'required|integer',
                    ];
                    break;
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title'    => 'required',
                        'content'  => 'required',
                        'image'    => 'image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:max_width=150,max_height=150',
                        'order'    => 'required|integer',
                    ];
                    break;
                }
            case 'DELETE':
                {
                    return [
                        'ids'   => 'required|array',
                        'ids.*' => 'integer'
                    ];
                    break;
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
            'title.required'     =>  '必須填寫服務項目名稱',
            'content.required'   =>  '必須填寫服務項目內容',
            'order.required'     =>  '必須填寫排序數字',
            'order.integer'      =>  '排序格式錯誤，請填寫數字',
            'image.required'     =>  '必須上傳一張橫幅圖片',
            'image.image'        =>  '上傳檔案必須為圖片格式',
            'image.mimes'        =>  '圖片格式必須為JPG、PNG、JPEG、GIF',
            'image.max'          =>  '上傳檔案不可超出10m',
            'image.dimensions'   =>  '上傳圖片尺寸不可超出150X150',
            'ids.required'       =>  '必須選擇刪除的資料',
            'ids.array'          =>  '刪除數據有誤，請重試',
            'ids.*.integer'      =>  '刪除數據有誤，請重試'
        ];
    }
}
