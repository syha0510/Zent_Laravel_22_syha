<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            
            'email' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
            'password_confirmation' => 'required',

        ];
    }

    public function messages()
    {
        return [
            
            'email.required' => 'Vui lòng nhập :attribute',
            'password.required' => 'Vui lòng nhập :attribute  ',
            'name.required' => 'Vui lòng nhập :attribute',
            'password_confirmation.required' => 'Vui lòng nhập lại :attribute',
        ];
    }

    public function attributes()
    {
        return[
            'email'=>'tài khoản',
            'password'=>'mật khẩu',
            'name' => 'tên',
            'password_confirmation' => 'mật khẩu'
        ];

    }
}
