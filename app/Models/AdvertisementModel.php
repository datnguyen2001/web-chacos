<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementModel extends Model
{
    use HasFactory;
    protected $table = 'advertisement';
    protected $guarded = [];
}
