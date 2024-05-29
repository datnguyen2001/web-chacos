<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdvertisingModel extends Model
{
    use HasFactory;
    protected $table = 'product_advertising';
    protected $fillable = [
        'category_id',
        'image',
        'url'
    ];
}
