<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class quenMatkhauRequest extends FormRequest
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
            'email' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Không để trống tên đăng nhập',
        ];
    }
}
