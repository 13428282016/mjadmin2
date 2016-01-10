<?php

namespace App\Http\Requests;


class PassswordReset extends Request
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
            'password_confirmation'=>'required',
            'password'=>'required|confirmed|min:6',
            'old_password'=>'required'
        ];
    }

    public function messages(){

        return [

            'password_confirmation.required'=>'必须填写新密码',
            'password.required'=>'必须填写新密码',
            'password.confirmed'=>'新密码不一致',
            'old_password.required'=>'必须填写原密码',
            'password.min'=>'新密码长度不能小于6位'
        ];
    }
}
