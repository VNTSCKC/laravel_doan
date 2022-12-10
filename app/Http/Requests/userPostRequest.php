<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userPostRequest extends FormRequest
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
            //'account_id' =>'required',
            'type_id'=>'required',
            'catalogue_id'=>'required',
            'title'=>'required',
            'content'=>'required',
            'location'=>'required',           
        ];
    }
    public function messages()
    {
        return [
            //'account_id.required' =>'Không tìm thấy AccountId',
            'type_id.required'=>'Không được bỏ trống Loại bài đăng',
            'catalogue_id.required'=>'Không được bỏ trống Loại danh mục',
            'title.required'=>'Không được bỏ trống Tiêu đề bài viết',
            'content.required'=>'Không được bỏ trống Nội dung bài viết',
            'location.required'=>'Không được bỏ trống Địa điểm (Nhặt/Mất đồ)',    
        ];
    }
}
