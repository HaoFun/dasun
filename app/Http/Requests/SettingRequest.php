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
            'config_info'    => 'required',
            'description'    => 'required',
            'keywords'       => 'required',
            'config_image'   => 'image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:max_width=1280,max_height=437',
            'config_image_title'  => 'image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:max_width=480,max_height=130',
            'config_ad_image.*'   => 'image|mimes::jpg,png,jpeg,gif|max:10240|dimensions:max_width=250,max_height=250'
        ];
    }

    public function messages()
    {
        return [
            'config_name.required'    => '必須填寫公司名稱',
            'config_name.min'         => '公司名稱必須為3字元以上',
            'config_phone.required'   => '必須填寫公司聯絡電話',
            'config_address.required' => '必須填寫公司聯絡地址',
            'config_email.required'   => '必須填寫公司聯絡信箱',
            'config_email.email'      => '公司信箱格式有誤',
            'config_fax.required'     => '必須填寫公司傳真號碼',
            'config_info.required'    => '必須填寫公司簡介',
            'description.required'    => '必須填寫網站描述',
            'keywords.required'       => '必須填寫網站關鍵字',
            'config_image.image'        => '首頁圖上傳檔案必須為圖片格式',
            'config_image.mimes'        => '首頁圖圖片格式必須為JPG、PNG、JPEG、GIF',
            'config_image.max'          => '首頁圖上傳檔案不可超出10m',
            'config_image.dimensions'   => '首頁圖上傳圖片尺寸不可超出1280X437',
            'config_image_title.image'        => '首頁圖標語上傳檔案必須為圖片格式',
            'config_image_title.mimes'        => '首頁圖標語圖片格式必須為JPG、PNG、JPEG、GIF',
            'config_image_title.max'          => '首頁圖標語上傳檔案不可超出10m',
            'config_image_title.dimensions'   => '首頁圖標語上傳圖片尺寸不可超出444X119',
            'config_ad_image.*.image'        => '首頁廣告圖上傳檔案必須為圖片格式',
            'config_ad_image.*.mimes'        => '首頁廣告圖圖片格式必須為JPG、PNG、JPEG、GIF',
            'config_ad_image.*.max'          => '首頁廣告圖上傳檔案不可超出10m',
            'config_ad_image.*.dimensions'   => '首頁廣告圖上傳圖片尺寸不可超出200X200',
        ];
    }
}
