<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'coupon_code',
        'shipping_address',
        'tracking_code',
        'grand_total',
        'tax',
        'shipping_cost',
        'delivery_status',
        'cancelled_reason',
        'cancelled_at',
        'accepted_at',
        'delivered_at',
        'completed_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
