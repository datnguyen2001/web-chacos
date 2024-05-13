<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorModel extends Model
{
    use HasFactory;
    protected $table = 'product_color';
    protected $fillable = [
        'product_id',
        'name',
        'image',
        'price',
        'promotional_price'
    ];

    public function sizes()
    {
        return $this->hasMany(ProductSizeModel::class, 'color_id');
    }
}
