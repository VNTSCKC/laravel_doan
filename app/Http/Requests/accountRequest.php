<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class accountRequest extends FormRequest
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
     *"username"=>$request->username,
            
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required',
            'email'=>'bail|required|email',
            'phone'=>'digits_between:10,12',
            'imageupload'=>'image',
            'address'=>'required',
            //'address'=>'regex:/[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống Họ tên',
            'email.required'=>'Không được để trống Email',
            'email.email'=>'Email không đúng định dạng',
            //'phone.regex'=>'Số điện thoại sai định dạng',
            //'phone.numeric'=>'Số điện thoại sai định dạng',
           'phone.digits_between'=>'Số điện thoại chỉ 10-12 ký số',
           //'address.regex'=>'sai dia chi',
           'address.required'=>'Không được để trống địa chỉ',
           'imageupload.image'=>'Định dạng hình ảnh không được hỗ trợ. Vui lòng chọn lại Ảnh đại diện',
            
        ];
    }
}
