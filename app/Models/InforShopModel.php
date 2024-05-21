<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InforShopModel extends Model
{
    use HasFactory;
    protected $table = 'infor_shop';
    protected $fillable = [
        'title',
        'content',
        'type'
    ];
}
