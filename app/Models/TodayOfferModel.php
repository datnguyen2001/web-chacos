<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodayOfferModel extends Model
{
    use HasFactory;
    protected $table = 'today_offer';
    protected $guarded = [];
}
