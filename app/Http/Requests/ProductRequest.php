<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    // Trong ProductRequest.php
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'stock' => 'required|integer|min:0', // Đổi từ 'stock' sang 'stock'
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm không quá 255 ký tự',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm không được âm',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'stock.required' => 'Vui lòng nhập số lượng',
            'stock.integer' => 'Số lượng phải là số nguyên',
            'stock.min' => 'Số lượng không được âm',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'image.max' => 'Hình ảnh không quá 2MB',
            'status.required' => 'Vui lòng chọn trạng thái',
        ];
    }
    // viết 2 hàm hasFile và file
    // public function hasFile($field)
    // {
    //     return $this->file($field) !== null;
    // }

    // public function file($key = null, $default = null): ?\Illuminate\Http\UploadedFile
    // {
    //     return $this->file($key, $default);
    // }
}
