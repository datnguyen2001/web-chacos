<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model
{
    use HasFactory;
    protected $table = 'product_size';
    protected $fillable = [
        'color_id',
        'name',
        'quantity',
    ];

    public function color()
    {
        return $this->belongsTo(ProductColorModel::class, 'color_id');
    }
}
