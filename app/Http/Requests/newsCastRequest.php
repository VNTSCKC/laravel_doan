<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newsCastRequest extends FormRequest
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
            'title'=>'required',
            'content'=>'required',
            'imageupload'=>'required|image',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Không được để trống Chủ đề',
            'content.required'=>'Không được để trống Nội dung',
           'imageupload.required'=>'Không được để trống Ảnh',
           'imageupload.image'=>'Định dạng hình ảnh không được hỗ trợ. Vui lòng chọn lại Ảnh',           
        ];
    }
}
