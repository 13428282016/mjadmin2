<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserStore extends Request
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
            //
            'name' => 'required',
            'avatar' => 'url',
            'roles' => 'required',
            'cellphone' => 'digits:11',
            'email' => 'email',
            'username'=>'required|min:6'

        ];
    }

    public function messages()
    {

        return [
            'name.required' => '必须填写真实姓名',
            'avatar.url' => '头像url非法',
            'roles.required' => '必须选择角色',
            'cellphone.digits' => '手机号码不正确',
            'email.email' => '电子邮箱不合法',
             'username.required'=>'必须填写账号',
            'username.min'=>'账号不能小于6个字符'

        ];
    }
}
