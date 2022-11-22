<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'password' => 'min:6|required',
            'password_confirm' => 'same:password|required'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Vui lòng không để trống',
            'password.min:6' => 'Vui lòng nhập ít nhất 6 ký tự',
            'password_confirm.required' => 'Vui lòng không để trống',
            'password_confirm.same:password' => 'Xác nhận mật khẩu không khớp',
        ];
    }
}
