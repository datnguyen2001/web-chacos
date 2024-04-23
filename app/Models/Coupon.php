<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'code',
        'details',
        'discount',
        'discount_type',
        'product_ids',
        'start_date',
        'end_date',
        'status'
    ];
}
