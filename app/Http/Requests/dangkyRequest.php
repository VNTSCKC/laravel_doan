<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class dangkyRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không để trống tên đăng nhập',
            'username.required' => 'Không để trống tên đăng nhập',
            'email.required' => 'Không để trống tên đăng nhập',
            'password.required' => 'Không để trống mật khẩu ',
            'phone.required' => 'Không để trống tên đăng nhập'
        ];
    }
}
