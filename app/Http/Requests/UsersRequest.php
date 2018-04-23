<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $user = User::find($this->user);
        switch($this->method())
        {
            case 'POST':
                {
                    return [
                        'name'      =>   'required|unique:users',
                        'email'     =>   'required|email|unique:users,email',
                        'password'  =>   'required|min:6|confirmed',
                    ];
                    break;
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name'      =>   'required|unique:users,name,'.$user->id,
                        'email'     =>   'required|email|unique:users,email,'.$user->id,
                        'password'  =>   'required|min:6|confirmed',
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
            'name.required'  =>  '必須填寫管理者名稱',
            'name.unique'    =>  '管理者名稱已重複',
            'email.required' =>  '必須填寫管理者信箱',
            'email.email'    =>  '管理者信箱格式錯誤',
            'email.unique'   =>  '管理者信箱已重複',
            'password.required' => '必須填寫密碼',
            'password.min'      => '密碼最少為6位數',
            'password.confirmed'=> '兩次密碼輸入不符合，請重試',
            'ids.required'      => '必須選擇刪除的資料',
            'ids.array'         => '刪除數據有誤，請重試',
            'ids.*.integer'     => '刪除數據有誤，請重試'
        ];
    }
}
