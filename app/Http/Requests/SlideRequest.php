<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên slide',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif',
            'image.max' => 'Ảnh không được vượt quá 2MB',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ',
        ];
    }
}
