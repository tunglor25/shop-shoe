<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //lỗi 403 nếu không được phép truy cập
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //luật validation
            'name' => 'required|string|min:3|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean|in:0,1',

        ];
    }
    //báo lỗi tiếng việt
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.string' => 'Tên danh mục phải là chuỗi',
            'name.min' => 'Tên danh mục phải nhất 3 ký tự',
            'name.max' => 'Tên danh mục không quá 255 ký tự',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Hình ảnh phải là jpeg, png, jpg, gif',
            'image.max' => 'Hình ảnh không quá 2MB',
            'status.required' => 'Trạng thái không được để trống',
            'status.boolean' => 'Trạng thái phải là boolean',
            'status.in' => 'Trạng thái phải là 0 hoặc 1',
        ];
    }
    // // viết 2 hàm hasFile và file
    // public function hasFile($field)
    // {
    //     return $this->file($field) !== null;
    // }

    // public function file($key = null, $default = null): ?\Illuminate\Http\UploadedFile
    // {
    //     return $this->file($key, $default);
    // }
}
