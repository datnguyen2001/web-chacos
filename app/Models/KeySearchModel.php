<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeySearchModel extends Model
{
    use HasFactory;
    protected $table = 'key_search';
    protected $fillable = [
        'name',
        'url'
    ];
}
