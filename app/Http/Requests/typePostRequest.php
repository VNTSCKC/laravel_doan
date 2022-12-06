<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class typePostRequest extends FormRequest
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
            'name'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống tên loại bài đăng',
            //'name.regex'=>'ten loai bai dang khong duoc chua chu so hoac ky tu dac biet',
        ];
    }
}
