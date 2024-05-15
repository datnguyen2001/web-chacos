<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'image',
        'description',
        'style',
        'type',
        'display',
        'is_hot'
    ];

    public function productColors()
    {
        return $this->hasMany(ProductColorModel::class, 'product_id');
    }

}
