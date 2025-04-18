<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //tắt chế độ tự động thêm cột created_at và updated_at
    public $timestamps = false;

    //connect với bảng nào thì ghi ra tên bảng đó
    protected $table = 'categories';
    protected $fillable = ['name', 'status', 'image'];

    //cấu hình quan hệ với model Product
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}

//hasMany: 1 danh mục có nhiều sản phẩm
//belongsTo: 1 sản phẩm thuộc về 1 danh mục
//Có thể kết nối nhiều bảng với nhau bằng cách sử dụng các hàm này
//Muốn sử dụng được các hàm này thì trong model Product và Category phải khai báo tên bảng tương ứng với tên bảng trong database
