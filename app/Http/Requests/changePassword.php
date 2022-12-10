<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePassword extends FormRequest
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
            'old_password'=> 'required',
            'new_password'=>'required',
            'confirmed_password'=>'same:new_password|required',
        ];
    }
    public function messages(){
        return[
            'old_password.required'=>'Mật khẩu cũ không được để trống',
            'new_password.required'=>'Mật khẩu mới không được để trống',
            'confirmed_password.same'=>'Mật khẩu xác nhận phải giống với mật khẩu mới',
            'confirmed_password.required'=>'Mật khẩu xác nhận không được để trống',
        ];
    }
}
