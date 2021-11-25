<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'image' => 'required'

        ];
    }

    public function messages()
    {
        return [
            
            'title.required' => ' :attribute không được bỏ trống  ',
            'content.required' => ' :attribute không được bỏ trống ',
            'image.required' => 'Vui lòng chọn :attribute'

        ];
    }

    public function attributes()
    {
        return[
            'title'=>'Tiêu đề',
            'content'=>'Nội dung',
            'image' => 'ảnh'
        ];

    }
}
