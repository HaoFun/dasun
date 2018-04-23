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
        switch($this->method())
        {
            case 'POST':
                {
                    return [
                        'module_id' => 'required|integer',
                        'image'     => 'required|image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:min_width=200,min_height=200,max_width=1280,max_height=437',
                    ];
                    break;
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'module_id' => 'required|integer',
                        'image'     => 'image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:min_width=200,min_height=200,max_width=1280,max_height=437',
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
            'module_id.required' => '必須選擇一個模板',
            'module_id.integer'  => '非法操作，請重試',
            'image.required'     => '必須上傳一張橫幅圖片',
            'image.image'        => '上傳檔案必須為圖片格式',
            'image.mimes'        => '圖片格式必須為JPG、PNG、JPEG、GIF',
            'image.max'          => '上傳檔案不可超出10m',
            'image.dimensions'   => '上傳圖片必須長寬大於200X200，且不可超出1280X437',
            'ids.required'      => '必須選擇刪除的資料',
            'ids.array'         => '刪除數據有誤，請重試',
            'ids.*.integer'     => '刪除數據有誤，請重試'
        ];
    }
}
