<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'image' => 'required|file|mimes:png,jpg',
        ];
    }

    public function messages()
    {
        return [
            
            'name.required' => ' :attribute không được bỏ trống  ',
            'email.required' => ' :attribute không được bỏ trống ',
            'password.required' => ' :attribute không được bỏ trống  ',
            'image.required' => ' Vui lòng chọn :attribute  ',
        ];
    }

    public function attributes()
    {
        return[
            'name'=>'Họ tên',
            'email'=>'Email',
            'password'=>'Mật khẩu',
            'image' =>'ảnh'
        ];

    }
}
