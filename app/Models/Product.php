<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    //
    protected $fillable = ['name', 'price', 'image', 'category_id', 'status', 'stock', 'views', 'description', 'created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
