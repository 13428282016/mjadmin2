<?php

namespace App\Http\Requests;



class UserPostEdit extends Request
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
            'cellphone' => 'digits:11',
            'email' => 'email'
        ];
    }

    public function messages()
    {

        return [
            'cellphone.digits' => '请填写正确的手机号码',
            'email.email' => '请填写正确的电子邮箱'

        ];
    }
}
