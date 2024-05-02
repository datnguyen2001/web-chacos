<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'menu_belong'
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // public function products()
    // {
    //     return $this->hasManyThrough(Product::class, ProductCategory::class, 'category_id', 'id', 'id', 'product_id');
    // }
}